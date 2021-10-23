@extends('layouts.app', ['title' => 'Post'])

@section('content')
    <div class="section-header">
        <h1>Post</h1>
        <div class="section-header-breadcrumb">
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
                                    <tr align="center">
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Tags</th>
                                        <th>Thumbnail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $result => $hasil)
                                        <tr>
                                            <td align="center" style="vertical-align: middle">{{ $result + $post->firstitem() }}</td>
                                            <td style="vertical-align: middle">{{ $hasil->judul }}</td>
                                            <td style="vertical-align: middle">{{ $hasil->category->name }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($hasil->tags as $tag)
                                                        <li>{{ $tag->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td align="center" style="vertical-align: middle">
                                                <div class="image-link">
                                                    <a href="{{ asset($hasil->gambar) }}" class="btn btn-secondary" target="_blank">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td align="center" style="vertical-align: middle">
                                                <form action="{{ route('post.destroy', $hasil->id) }}" method="POST">
                                                    <a href="{{ route('post.edit', $hasil->id) }}"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yaknin menghapus data ini?')"><i class="fas fa-trash"></i></button>
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