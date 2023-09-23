@extends('rgpanel.layout.app')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            @can('create user')
                <button data-bs-toggle="modal" data-bs-target="#modalUser" class="btn btn-primary btn-sm mb-2 js-btn-modal-open"
                    data-action="{{ route('rgpanel.users.store', ['locale' => app()->getLocale()]) }}"
                    href="{{ route('rgpanel.users.create', ['locale' => app()->getLocale()]) }}">
                    @lang('global.Create User')
                </button>
            @endcan
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>@lang('global.Name')</th>
                            <th>@lang('global.Email')</th>
                            <th>@lang('global.Created At')</th>
                            <th>@lang('global.Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->created_at->format('F d Y, H:i') }}</td>
                                <td class="d-flex justify-items-center">
                                    @can('update user')
                                        <button data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#modalUser"
                                            data-url="{{ route('rgpanel.users.edit', ['locale' => app()->getLocale(), 'user' => $item->id]) }}"
                                            class="btn btn-sm btn-warning d-flex align-items-center fs-6 p-1 js-btn-edit">
                                            <span class="material-icons fs-6">
                                                edit
                                            </span>
                                        </button>
                                    @endcan
                                    @can('delete user')
                                        <button
                                            data-url="{{ route('rgpanel.users.destroy', ['locale' => app()->getLocale(), 'user' => $item->id]) }}"
                                            data-id="{{ $item->id }}" data-btn-label="@lang('global.delete')"
                                            data-title="@lang('global.delete_confirmation')" data-btn-cancel-label="@lang('global.cancel')"
                                            class="btn btn-sm btn-danger d-flex align-items-center fs-6 p-1 js-btn-delete">
                                            <span class="material-icons fs-6">
                                                delete
                                            </span>
                                        </button>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="modalUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUserLabel">@lang('global.Users') @lang('global.Form')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" class="js-form-user">
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="form-label">@lang('global.Name')</label>
                            <input type="name" class="form-control" name="name" id="name">
                            <div class="invalid-feedback" id="nameError"></div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">@lang('global.Email')</label>
                            <input type="email" class="form-control" name="email" id="email">
                            <div class="invalid-feedback" id="emailError"></div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">@lang('auth.label_password')</label>
                            <input type="password" class="form-control" name="password" id="password"
                                aria-describedby="password"
                                placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                            <p class="text-sm text-muted js-password-description d-none"> <i>**@lang('global.empty_do_not_changes')</i></p>
                            <div class="invalid-feedback" id="passwordError"></div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h5>@lang('global.Permissions')</h5>
                            <div class="form-check col-6">
                                <input class="form-check-input js-select-all-permissions" type="checkbox" id="selectAll">
                                <label class="form-check-label" for="selectAll">
                                    Select All Permissions
                                </label>
                            </div>
                        </div>
                        <div class="invalid-feedback" id="permissionsError"></div>
                        @foreach ($permissions as $item)
                            <div for="role" class="form-label">{{ $item->name }}</div>
                            <div class="row">
                                @foreach ($item->permissions as $permission)
                                    <div class="form-check col-6">
                                        <input class="form-check-input js-input-permission" type="checkbox"
                                            name="permissions[]" value="{{ $permission->name }}"
                                            id="{{ str()->slug($permission->name) }}">
                                        <label class="form-check-label" for="{{ str()->slug($permission->name) }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm js-btn-submit">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @vite('resources/js/rgpanel/user/index.js')
@endsection
