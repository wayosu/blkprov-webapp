@extends('layouts.admin.app', ['title' => 'Edit Category'])

@section('content')
    <div class="section-header">
        <h1>Edit Category</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/category">Category</a></div>
            <div class="breadcrumb-item">Edit Category</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('category.index') }}" class="btn btn-secondary mb-4"><i
                                class="fas fa-arrow-circle-left"></i> Back to Category</a>

                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror">
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
