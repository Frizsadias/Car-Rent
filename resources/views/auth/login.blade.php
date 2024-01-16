@extends('adminlte.layouts.auth')

@section('content')

<body class="hold-transition login-page" style="background-image: url('/assets/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="login-box">
        
        <div class="card">
            <div class="login-logo">
            <h1><a href="{{ route('home') }}"><strong>Persewaan Mobil</strong></a></h1>
        </div>
            <div class="card-body login-card-body">

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                        </div>
                    </div>
                </form>

                @if (Route::has('password.request'))
                <p class="mt-2">
                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                </p>
                @endif

                @if (Route::has('register'))
                <p class="mt-2">
                    <a href="{{ route('register') }}" class="text-center">{{ __('Register') }}</a>
                </p>
                @endif
            </div>
        </div>
    </div>
    <!-- /.login-box -->
</body>
@endsection
