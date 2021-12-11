@extends('layouts.admin.app', ['title' => 'Create Gallery'])

@section('content')
    <div class="section-header">
        <h1>Create Gallery</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('penulis.gallery.index') }}">Gallery</a></div>
            <div class="breadcrumb-item">Create Gallery</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('penulis.gallery.index') }}" class="btn btn-secondary mb-4"><i
                                class="fas fa-arrow-circle-left"></i> Back to Gallery</a>

                        <form action="{{ route('penulis.gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Isi</label>
                                <textarea name="body" class="form-control summernote-simple @error('body') is-invalid @enderror"></textarea>
                                @error('body')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Cover</label>
                                <input type="file" name="cover" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="images[]" class="form-control-file" multiple>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection