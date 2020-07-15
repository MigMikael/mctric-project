@extends('app')

@section('content')
<header class="sub-title">
    <div class="sub-title-overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center" style="padding-top: 60px;">
            <div class="w-100 text-white" style="z-index: 3">
                <h1 class="text-ellipsis text-center">
                    {{ __('messages.app.loginMenu') }}
                </h1>
            </div>
        </div>
    </div>
</header>
<section class="bg-light">
    <div class="row justify-content-center" style="margin-left: 0px !important; margin-right: 0px !important;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{--                        <div class="form-group row">--}}
                        {{--                            <div class="col-md-6 offset-md-4">--}}
                        {{--                                <div class="form-check">--}}
                        {{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                        {{--                                    <label class="form-check-label" for="remember">--}}
                        {{--                                        {{ __('Remember Me') }}--}}
                        {{--                                    </label>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                {{--                                @if (Route::has('password.request'))--}}
                                {{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                {{--                                        {{ __('Forgot Your Password?') }}--}}
                                {{--                                    </a>--}}
                                {{--                                    <a class="btn btn-link" href="{{ url('/register') }}">--}}
                                {{--                                        {{ __('Register?') }}--}}
                                {{--                                    </a>--}}
                                {{--                                @endif--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection