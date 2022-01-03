@extends('layouts.admin.app', ['title' => 'Edit Sub Kejuruan'])

@section('content')
    <div class="section-header">
        <h1>Edit Sub Kejuruan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('subkejuruan.index') }}">Sub Kejuruan</a></div>
            <div class="breadcrumb-item">Edit Sub Kejuruan</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('subkejuruan.index') }}" class="btn btn-secondary mb-4"><i
                                class="fas fa-arrow-circle-left"></i> Back to Sub Kejuruan</a>

                        <form action="{{ route('subkejuruan.update', $subkejuruan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Kejuruan</label>
                                <select name="kejuruan_id" class="form-control select2">
                                    <option value="" disabled selected>Pilih Kejuruan</option>
                                    @foreach ($kejuruan as $result)
                                        <option value="{{ $result->id }}" @if ($subkejuruan->kejuruan_id == $result->id) selected @endif>
                                            {{ $result->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Sub</label>
                                <input type="text" name="nama" value="{{ $subkejuruan->nama }}" class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kurikulum</label>
                                <input type="hidden" name="kurikulum_lama" value="{{ $subkejuruan->kurikulum }}">
                                <input type="file" name="kurikulum" class="form-control-file @error('kurikulum') is-invalid @enderror">
                                @error('kurikulum')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="hidden" name="image_lama" value="{{ $subkejuruan->image }}">
                                <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Detail</label>
                                <textarea name="detail" class="form-control summernote-simple @error('detail') is-invalid @enderror">{!! $subkejuruan->detail !!}</textarea>
                                @error('detail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
