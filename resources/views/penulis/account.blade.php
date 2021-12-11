@extends('layouts.admin.app', ['title' => 'Setting Account'])

@section('content')
    <div class="section-header">
        <h1>Setting Account</h1>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('penulis.account.update', $user->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" readonly>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>New Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection