@extends('layouts.app', ['title' => 'Edit Tag'])

@section('content')
    <div class="section-header">
        <h1>Edit Tag</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/home">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="/tag">Tag</a></div>
            <div class="breadcrumb-item">Edit Tag</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('tag.index') }}" class="btn btn-secondary mb-4"><i
                                class="fas fa-arrow-circle-left"></i> Back to Tag</a>

                        <form action="{{ route('tag.update', $tag->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Tag</label>
                                <input type="text" name="name" value="{{ $tag->name }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
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