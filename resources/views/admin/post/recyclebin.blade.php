@extends('layouts.admin.app', ['title' => 'Recycle Bin'])

@section('content')
    <div class="section-header">
        <h1>Recycle Bin</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></div>
            <div class="breadcrumb-item">Recycle Bin</div>
        </div>
    </div>

    <div class="section-body">
        @include('components.alert')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('post.index') }}" class="btn btn-secondary mb-4"><i
                                class="fas fa-arrow-circle-left"></i> Back to Post</a>
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
                                            {{-- <td>
                                                <ul>
                                                    @foreach ($hasil->tags as $tag)
                                                        <li>{{ $tag->name }}</li>
                                                    @endforeach
                                                </ul>
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
                                                <form action="{{ route('post.deletepermanently', $hasil->id) }}" method="POST">
                                                    <a href="{{ route('post.restore', $hasil->id) }}" class="btn btn-warning" title="Restore"><i class="fas fa-trash-restore"></i></a>
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="gambar" value="{{ $hasil->gambar }}">
                                                    <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Yakin menghapus data ini?. Data akan terhapus selamanya.')"><i class="fas fa-trash"></i></button>
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