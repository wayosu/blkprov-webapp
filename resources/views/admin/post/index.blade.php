@extends('layouts.app', ['title' => 'Post'])

@section('content')
    <div class="section-header">
        <h1>Post</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/home">Dashboard</a></div>
            <div class="breadcrumb-item">Post</div>
        </div>
    </div>

    <div class="section-body">
        @include('components.alert')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('post.create') }}" class="btn btn-primary mb-4"><i
                                class="fas fa-plus-circle"></i> Create Post</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-md table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $result => $hasil)
                                        <tr>
                                            <td>{{ $result + $post->firstitem() }}</td>
                                            <td>{{ $hasil->judul }}</td>
                                            <td>
                                                <form action="{{ route('post.destroy', $hasil->id) }}" method="POST">
                                                    <a href="{{ route('post.edit', $hasil->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yaknin menghapus data ini?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $post->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection