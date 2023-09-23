<?php
namespace App\Traits;

trait ResponseAjax
{
         public function errorResponse(
                  $message = null,
                  $code = 500,
                  $data = null,
                  $title = null,
                  $action = null
         ) {
                  return response()->json([
                           'title' => $title ? $title : __('global.Error'),
                           'message' => $message ? $message : __('global.delete_failed'),
                           'action' => $action ? $action : __('global.Ok'),
                           'data' => $data
                  ], $code);
         }
         public function successResponse(
                  $message = null,
                  $code = 200,
                  $data = null,
                  $title = null,
                  $action = null,
                  $withSession = true
         ) {
                  if ($withSession) {
                           session()->flash('message', $message ? $message : __('global.delete_success'));
                  }
                  return response()->json([
                           'title' => $title ? $title : __('global.success'),
                           'message' => $message ? $message : __('global.delete_success'),
                           'action' => $action ? $action : __('global.Ok'),
                           'data' => $data
                  ], $code);
         }
}