@extends('rgpanel.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('rgpanel.banners.store', ['locale' => app()->getLocale()]) }}"
                enctype="multipart/form-data">

                @csrf
                @method('post')
                <div class="form-group mt-2">
                    <label for="image_desktop">@lang('banner.Image Desktop')</label>
                    <input type="file" class="form-control" id="image_desktop" name="image_desktop">
                    @error('image_desktop')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="title">@lang('banner.Title') (@lang('global.Optional'))</label>
                    <input type="text" class="form-control" id="title" name="title">
                    @error('title')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="description">@lang('banner.Description') (@lang('global.Optional'))</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                    @error('description')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="button_label">@lang('banner.Button Label') (@lang('global.Optional'))</label>
                    <input type="text" class="form-control" id="button_label" name="button_label">
                    <div class="invalid-feedback" id="button_labelError"></div>
                </div>

                <div class="form-group mt-2">
                    <label for="button_link">@lang('banner.Button Link') (@lang('global.Optional'))</label>
                    <input type="text" class="form-control" id="button_link" name="button_link">
                    <div class="invalid-feedback" id="button_linkError"></div>
                </div>

                <div class="form-group mt-2">
                    <label for="image_mobile">@lang('banner.Image Mobile') (@lang('global.Optional'))</label>
                    <input type="file" class="form-control" id="image_mobile" name="image_mobile">
                    @error('image_mobile')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <a href="{{ route('rgpanel.banners.index', ['locale' => app()->getLocale()]) }}"
                    class="btn btn-danger mt-3 btn-sm">@lang('global.Back')</a>
                <button type="submit" class="btn btn-primary mt-3 btn-sm">@lang('global.Submit')</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection
