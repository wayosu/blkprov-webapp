@extends('layouts.admin.app', ['title' => 'Edit Gallery'])

@section('content')
    <div class="section-header">
        <h1>Edit Gallery</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Gallery</a></div>
            <div class="breadcrumb-item">Edit Gallery</div>
        </div>
    </div>

    <div class="section-body">
        @include('components.alert')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('gallery.index') }}" class="btn btn-secondary mb-4"><i
                                class="fas fa-arrow-circle-left"></i> Back to Gallery</a>

                        <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="title" value="{{ $gallery->title }}"
                                    class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Isi</label>
                                <textarea name="body"
                                    class="form-control summernote-simple @error('body') is-invalid @enderror">{{ $gallery->body }}</textarea>
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

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Cover</label>
                            <img src="{{ asset($gallery->cover) }}" alt=""
                                        style="width: 100%;max-height: 300px;object-fit: cover;">
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            @if (count($gallery->images) > 0)
                                <div class="d-flex flex-row flex-nowrap my-overflow-x">
                                    @foreach ($gallery->images as $img)
                                        <form action="{{ route('gallery.deleteimage', $img->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <div class="my-content-img">
                                                {{-- <input type="text" name="" value="{{ $img->id }}"> --}}
                                                <img src="{{ asset($img->image) }}" alt="" class="m-1"
                                                    style="width: 180px;height: 180px;object-fit: cover;">
                                                <button type="submit" name="deleteimage"
                                                    class="btn btn-sm btn-danger my-btn-img">Delete Image</button>
                                            </div>
                                        </form>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
