@extends('layouts.app', ['title' => 'BLK Gorontalo'])

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <img src="{{ asset('assets/img/logo-kemenaker-small.png') }}" alt="logo" width="100">
                    <h3 class="blk-text mt-4">BLK Gorontalo</h3>
                </div>

                <div class="card blk-card">
                    <div class="card-header">
                        <h4 class="blk-text">Login</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control blk-form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                    {{-- <div class="float-right">
                                        <a href="auth-forgot-password.html" class="text-small">
                                            Forgot Password?
                                        </a>
                                    </div> --}}
                                </div>
                                <input id="password" type="password" class="form-control blk-form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
{{-- 
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                        id="remember-me">
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <button type="submit" class="btn blk-btn text-white btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>
                        {{-- <div class="text-center mt-4 mb-3">
                            <div class="text-job text-muted">Login With Social</div>
                        </div>
                        <div class="row sm-gutters">
                            <div class="col-6">
                                <a class="btn btn-block btn-social btn-facebook">
                                    <span class="fab fa-facebook"></span> Facebook
                                </a>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-block btn-social btn-twitter">
                                    <span class="fab fa-twitter"></span> Twitter
                                </a>
                            </div>
                        </div> --}}

                    </div>
                </div>
                {{-- <div class="mt-5 text-muted text-center">
                    Don't have an account? <a href="{{ route('register') }}" class="blk-text">Create One</a>
                </div> --}}
                <div class="simple-footer">
                    Copyright &copy; 2021 BLK Provinsi Gorontalo.
                </div>
            </div>
        </div>
    </div>
@endsection
