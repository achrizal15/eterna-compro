@extends('rgpanel.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <a class="btn btn-success btn-sm mb-2"
                href="{{ route('rgpanel.banners.create', ['locale' => app()->getLocale()]) }}">@lang('banner.Create Banner')</a>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>@lang('banner.Image Desktop')</th>
                            <th>@lang('banner.Image Mobile')</th>
                            <th>@lang('banner.Title')</th>
                            <th>@lang('banner.Description')</th>
                            <th>@lang('banner.Button Label')</th>
                            <th>@lang('banner.Button Link')</th>
                            <th>@lang('banner.Action')</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
