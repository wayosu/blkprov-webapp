@extends('layouts.admin.app', ['title' => 'Edit Kejuruan'])

@section('content')
    <div class="section-header">
        <h1>Edit Kejuruan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('kejuruan.index') }}">Kejuruan</a></div>
            <div class="breadcrumb-item">Edit Kejuruan</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('kejuruan.index') }}" class="btn btn-secondary mb-4"><i
                                class="fas fa-arrow-circle-left"></i> Back to Kejuruan</a>

                        <form action="{{ route('kejuruan.update', $kejuruan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Nama Kejuruan</label>
                                <input type="text" name="nama" value="{{ $kejuruan->nama }}" class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control summernote-simple @error('deskripsi') is-invalid @enderror">{{ $kejuruan->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="hidden" name="gambar_lama" value="{{ $kejuruan->gambar }}">
                                <input type="file" name="gambar" class="form-control-file">
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card overflow-hidden">
                    <div class="card-body p-0 m-0">
                        <img src="{{ asset($kejuruan->gambar) }}" alt="gambar" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
