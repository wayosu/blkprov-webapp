@extends('layouts.admin.app', ['title' => 'Register'])

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="login-brand">
                    <img src="{{ asset('assets/img/logo-kemenaker-small.png') }}" alt="logo" width="100">
                    <h3 class="blk-text mt-4">BLK Gorontalo</h3>
                </div>

                <div class="card blk-card">
                    <div class="card-header">
                        <h4 class="blk-text">Register</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control blk-form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control blk-form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control blk-form-control pwstrength @error('password') is-invalid @enderror" name="password" data-indicator="pwindicator" required autocomplete="new-password">
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="password-confirm" class="d-block">Password Confirmation</label>
                                    <input id="password-confirm" type="password" class="form-control blk-form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn blk-btn text-white btn-lg btn-block">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; 2021 BLK Provinsi Gorontalo.
                </div>
            </div>
        </div>
    </div>
@endsection
