@extends('layouts.admin.app', ['title' => 'Create Sub Kejuruan'])

@section('content')
    <div class="section-header">
        <h1>Create Sub Kejuruan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('subkejuruan.index') }}">Sub Kejuruan</a></div>
            <div class="breadcrumb-item">Create Sub Kejuruan</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('subkejuruan.index') }}" class="btn btn-secondary mb-4"><i
                                class="fas fa-arrow-circle-left"></i> Back to Sub Kejuruan</a>

                        <form action="{{ route('subkejuruan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Kejuruan</label>
                                <select name="kejuruan_id" class="form-control select2">
                                    <option value="" disabled selected>Pilih Kejuruan</option>
                                    @foreach ($kejuruan as $result)
                                        <option value="{{ $result->id }}">{{ $result->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Sub</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kurikulum</label>
                                <input type="file" name="kurikulum" class="form-control-file @error('kurikulum') is-invalid @enderror">
                                @error('kurikulum')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Detail</label>
                                <textarea name="detail" class="form-control summernote-simple @error('detail') is-invalid @enderror"></textarea>
                                @error('detail')
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
