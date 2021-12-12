@extends('layouts.admin.app', ['title' => 'Edit Profile'])

@section('content')
    <div class="section-header">
        <h1>Edit Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Edit Profile</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('profile.index') }}" class="btn btn-secondary mb-4"><i
                            class="fas fa-arrow-circle-left"></i> Back to Profile</a>

                        <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Profile</label>
                                        <textarea name="profile" class="form-control summernote-simple">{{ $profile->profile }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Visi & Misi</label>
                                        <textarea name="visimisi" class="form-control summernote-simple">{{ $profile->visimisi }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Kata Sambutan</label>
                                        <textarea name="sambutan" class="form-control summernote-simple">{{ $profile->sambutan }}</textarea>
                                    </div>
                                    <div class="form-group overflow-hidden">
                                        <label>Struktur Organisasi</label>
                                        <input type="hidden" name="struktur_lama" value="{{ $profile->struktur }}">
                                        <input type="file" name="struktur" class="form-control-file @error('struktur') is-invalid @enderror">
                                        @error('struktur')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group overflow-hidden">
                                        <label>Kurikulum</label>
                                        <input type="hidden" name="kurikulum_lama" value="{{ $profile->kurikulum }}">
                                        <input type="file" name="kurikulum" class="form-control-file @error('kurikulum') is-invalid @enderror">
                                        @error('kurikulum')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control">{{ $profile->alamat }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="text" name="telepon" class="form-control" value="{{ $profile->telepon }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Maps</label>
                                        <input type="text" name="map" class="form-control" value="{{ $profile->map }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input type="text" name="twitter" class="form-control" value="{{ $profile->twitter }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook" class="form-control" value="{{ $profile->facebook }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input type="text" name="instagram" class="form-control" value="{{ $profile->instagram }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Youtube</label>
                                        <input type="text" name="youtube" class="form-control" value="{{ $profile->youtube }}">
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection