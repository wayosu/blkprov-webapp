@extends('layouts.admin.app', ['title' => 'Edit Pengumuman'])

@section('content')
    <div class="section-header">
        <h1>Edit Pengumuman</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('pengumuman.index') }}">Pengumuman</a></div>
            <div class="breadcrumb-item">Edit Pengumuman</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary mb-4"><i
                                class="fas fa-arrow-circle-left"></i> Back to Pengumuman</a>

                        <div class="mb-4 d-flex justify-content-center">
                            <img class="card-img-top" width="100%" height="300" style="object-fit: cover;object-position:center;" src="{{ asset($pengumuman->gambar) }}" alt="Card image cap">
                        </div>

                        <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Pengumuman</label>
                                <input type="text" name="judul" value="{{ $pengumuman->judul }}" class="form-control @error('judul') is-invalid @enderror">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Isi</label>
                                <textarea name="isi" class="form-control summernote-simple @error('isi') is-invalid @enderror">{{ $pengumuman->isi }}</textarea>
                                @error('isi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input type="hidden" name="gambar_lama" value="{{ $pengumuman->gambar }}">
                                <input type="file" name="gambar" class="form-control-file">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
