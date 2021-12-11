@extends('layouts.admin.app', ['title' => 'Create Pengumuman'])

@section('content')
    <div class="section-header">
        <h1>Create Pengumuman</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('penulis.pengumuman.index') }}">Pengumuman</a></div>
            <div class="breadcrumb-item">Create Pengumuman</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('penulis.pengumuman.index') }}" class="btn btn-secondary mb-4"><i
                                class="fas fa-arrow-circle-left"></i> Back to Pengumuman</a>

                        <form action="{{ route('penulis.pengumuman.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Isi</label>
                                <textarea name="isi" class="form-control summernote-simple @error('isi') is-invalid @enderror"></textarea>
                                @error('isi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
