@extends('layouts.admin.app', ['title' => 'Edit Post'])

@section('content')
    <div class="section-header">
        <h1>Edit Post</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></div>
            <div class="breadcrumb-item">Edit Post</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('penulis.post.index') }}" class="btn btn-secondary mb-4"><i
                            class="fas fa-arrow-circle-left"></i> Back to Post</a>
                        
                        <div class="mb-4 d-flex justify-content-center">
                            <img class="card-img-top" width="100%" height="300" style="object-fit: cover;object-position:center;" src="{{ asset($post->gambar) }}" alt="Card image cap">
                        </div>
                        
                        <form action="{{ route('penulis.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" value="{{ $post->judul }}"
                                    class="form-control @error('judul') is-invalid @enderror">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="category_id" class="form-control select2">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach ($category as $result)
                                        <option value="{{ $result->id }}" @if ($post->category_id == $result->id) selected @endif>
                                            {{ $result->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tag</label>
                                <select name="tags[]" class="form-control select2" multiple="">
                                    @foreach ($tags as $r_tags)
                                        <option value="{{ $r_tags->id }}"
                                        @foreach ($post->tags as $value)
                                            @if ($r_tags->id == $value->id)
                                                selected
                                            @endif
                                        @endforeach
                                        >
                                            {{ $r_tags->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Konten</label>
                                <textarea name="konten" class="form-control summernote-simple">{{ $post->konten }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input type="hidden" name="gambar_lama" value="{{ $post->gambar }}">
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
