<?php

namespace App\Http\Controllers\Rgpanel;

use App\Models\User;
use App\Traits\ResponseAjax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    use ResponseAjax;
    public function index(Request $request)
    {
        $users = User::paginate(10)->withQueryString();
        $permissions = Role::with([
            'permissions' => function ($query) {
                $query->select('name');
            }
        ])->get();
        $title = __('menu.users');
        return view('rgpanel.users.index', compact('users', 'title', 'permissions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required',
            'permissions' => 'array|required'
        ]);
        try {
            DB::beginTransaction();
            $user = User::create($request->only('email', 'name', 'password'));
            $user->syncPermissions($request->permissions);
            DB::commit();
            return $this->successResponse(message: __('global.create_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: __('global.create_failed'));
        }

    }
    public function update(Request $request, $locale, User $user)
    {
        $rules = [
            'email' => 'required|email',
            'name' => 'required',
            'permissions' => 'array|required'
        ];
        if ($request->email != $user->email) {
            $rules['email'] .= '|unique:users,email';
        }
        $request->validate($rules);

        try {
            DB::beginTransaction();
            if ($request->has('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->email = $request->email;
            $user->name = $request->name;
            $user->save();
            $user->syncPermissions($request->permissions);
            DB::commit();
            return $this->successResponse(message: __('global.update_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: __('global.update_failed'));
        }

    }
    public function destroy($locale, User $user)
    {
        try {
            DB::beginTransaction();
            $user->roles()->detach();
            $user->permissions()->detach();
            $user->deleteOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.delete_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.delete_failed'));
        }
    }
    public function edit($locale, User $user)
    {
        try {
            return $this->successResponse(
                data: [
                    'user' => $user->load([
                        'permissions' => fn($query) => $query->select('name')
                    ]),
                    'url' => route('rgpanel.users.update', [
                        'locale' => app()->getLocale(),
                        'user' => $user->id
                    ])
                ],
                withSession: false
            );
        } catch (\Throwable $th) {
            return $this->errorResponse(message: $th->getMessage());
        }
    }
}