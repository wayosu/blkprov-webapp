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
            <div class="col-12 col-md-4">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4 class="text-warning">Pending</h4>
                        <div class="card-header-action">
                            <h4 class="text-warning">{{ $total_berita_pending }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-success">
                    <div class="card-header">
                        <h4 class="text-success">Publish</h4>
                        <div class="card-header-action">
                            <h4 class="text-success">{{ $total_berita_publish }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-danger">
                    <div class="card-header">
                        <h4 class="text-danger">Rejected</h4>
                        <div class="card-header-action">
                            <h4 class="text-danger">{{ $total_berita_rejected }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('post.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus-circle"></i>
                            Create Post</a>
                        <a href="{{ route('post.recyclebin') }}" class="btn btn-primary mb-4"><i
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
                                        <th>Publishing</th>
                                        <th>Penulis</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $result => $hasil)
                                        <tr>
                                            <td align="center" style="vertical-align: middle">{{ $loop->iteration }}</td>
                                            <td style="vertical-align: middle">
                                                <h6 class="m-0 font-weight-normal" style="font-size: 14px">
                                                    {{ $hasil->judul }}
                                                    @if ($hasil->status == 0)
                                                        <span class="badge badge-warning">Pending</span>
                                                    @endif
                                                </h6>
                                            </td>
                                            <td style="vertical-align: middle">{{ $hasil->category->name }}</td>
                                            <td style="vertical-align: middle">{{ $hasil->created_at->isoFormat('LLLL') }}
                                            </td>
                                            <td align="center" style="vertical-align: middle">
                                                <div class="image-link">
                                                    <a href="{{ asset($hasil->gambar) }}" class="btn btn-secondary"
                                                        target="_blank">
                                                        <i class="fas fa-image"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle" align="center">
                                                @if ($hasil->status == 2)
                                                    <span class="badge badge-danger px-4">Rejected</span>
                                                @elseif ($hasil->status == 1)
                                                    <span class="badge badge-success px-4">Publish</span>
                                                @else
                                                    <form action="{{ route('post.publishing', $hasil->id) }}" method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit" name="publish" class="btn btn-success"><i
                                                                class="fas fa-check"></i></button>
                                                        <button type="submit" name="rejected" class="btn btn-danger"><i
                                                                class="fas fa-times"></i></button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td align="center" style="vertical-align: middle">{{ $hasil->user->name }}
                                            </td>
                                            <td align="center" style="vertical-align: middle">
                                                <form action="{{ route('post.destroy', $hasil->id) }}" method="POST">
                                                    <a href="{{ route('post.edit', $hasil->id) }}"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Yaknin menghapus data ini?')"><i
                                                            class="fas fa-trash"></i></button>
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
