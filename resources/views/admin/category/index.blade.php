@extends('layouts.app', ['title' => 'Category'])

@section('content')
    <div class="section-header">
        <h1>Category</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>
            <div class="breadcrumb-item">Category</div>
        </div>
    </div>

    <div class="section-body">
        @include('components.alert')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('category.create') }}" class="btn btn-primary mb-4"><i
                                class="fas fa-plus-circle"></i> Create Category</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-md table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $result => $hasil)
                                        <tr>
                                            <td>{{ $result + $category->firstitem() }}</td>
                                            <td>{{ $hasil->name }}</td>
                                            <td>
                                                <a href="#" class="btn btn-warning">Edit</a>
                                                <a href="#" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $category->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
