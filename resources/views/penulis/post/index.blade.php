@extends('layouts.admin.app', ['title' => 'Post'])

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
                        <a href="{{ route('penulis.post.create') }}" class="btn btn-primary mb-4"><i
                                class="fas fa-plus-circle"></i> Create Post</a>
                        <a href="{{ route('penulis.post.recyclebin') }}" class="btn btn-primary mb-4"><i
                                class="fas fa-trash"></i> Recycle Bin</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-md table-bordered data-table">
                                <thead>
                                    <tr align="center">
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Tanggal Buat</th>
                                        <th>Thumbnail</th>
                                        <th>Penulis</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $result => $hasil)
                                        <tr>
                                            <td align="center" style="vertical-align: middle">{{ $loop->iteration }}</td>
                                            <td style="vertical-align: middle">{{ $hasil->judul }}</td>
                                            <td style="vertical-align: middle">{{ $hasil->category->name }}</td>
                                            {{-- <td align="center" style="vertical-align: middle">
                                                @foreach ($hasil->tags as $tag)
                                                    <h6><span class="badge badge-sm badge-primary">{{ $tag->name }}</span></h6>
                                                @endforeach
                                            </td> --}}
                                            <td>{{ $hasil->created_at->isoFormat('LLLL') }}</td>
                                            <td align="center" style="vertical-align: middle">
                                                <div class="image-link">
                                                    <a href="{{ asset($hasil->gambar) }}" class="btn btn-secondary" target="_blank">
                                                        <i class="fas fa-image"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td align="center" style="vertical-align: middle">{{ $hasil->user->name }}</td>
                                            <td align="center" style="vertical-align: middle">
                                                <form action="{{ route('penulis.post.destroy', $hasil->id) }}" method="POST">
                                                    <a href="{{ route('penulis.post.edit', $hasil->id) }}"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection