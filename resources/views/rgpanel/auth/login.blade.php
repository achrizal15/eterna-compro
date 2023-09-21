@extends('rgpanel.layout.auth')
@section('content')
    <div class="logo">
        <a href="index.html">RGPANEL</a>
    </div>
    <p class="auth-description">@lang('auth.label_description')</p>

    <form action="{{ route('rgpanel.auth.index', ['locale' => app()->getLocale()]) }}" method="POST" class="js-form-login">
        @method('post')
        @csrf
        <div class="auth-credentials m-b-xxl">
            <label for="signInEmail" class="form-label">@lang('auth.label_email')</label>
            <input type="email" class="form-control m-b-md" id="signInEmail" aria-describedby="signInEmail" name="email"
                placeholder="example@neptune.com">
            <div class="invalid-feedback" id="emailError"></div>
            <label for="signInPassword" class="form-label">@lang('auth.label_password')</label>
            <input type="password" class="form-control" name="password" id="signInPassword"
                aria-describedby="signInPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
            <div class="invalid-feedback" id="passwordError"></div>
        </div>

        <div class="auth-submit">
            <button type="submit" class="btn btn-primary">@lang('auth.sign_in')</button>
        </div>
    </form>

    <div class="divider"></div>
@endsection
@section('js')
    @vite('resources/js/rgpanel/auth.js')
@endsection
