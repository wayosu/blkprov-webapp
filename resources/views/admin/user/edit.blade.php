@extends('layouts.app', ['title' => 'Edit User'])

@section('content')
    <div class="section-header">
        <h1>Edit User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/user">User</a></div>
            <div class="breadcrumb-item">Edit User</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary mb-4"><i
                                class="fas fa-arrow-circle-left"></i> Back to User</a>

                        <form action="{{ route('user.update', $user->id) }}" method="POST">
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
                                <label>Peran</label>
                                <select name="roles" class="form-control">
                                    <option value="" hidden disabled selected>Pilih Peran</option>
                                    @if ($user->roles == 1)                                        
                                        <option value="1" selected>Administrator</option>
                                        <option value="0">Penulis</option>
                                    @else
                                        <option value="1">Administrator</option>
                                        <option value="0" selected>Penulis</option>
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
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