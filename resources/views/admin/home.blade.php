@extends('layouts.admin.app', ['title' => 'Dashboard'])

@section('content')
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_user }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Berita</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_berita }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pengumuman</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_pengumuman }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-image"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Gallery</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_galeri }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Berita Terbaru</h4>
                        <div class="card-header-action">
                            <a href="{{ route('post.index') }}" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Penulis</th>
                                        <th>Thumbnail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($berita_terbaru->count() > 0)
                                        @foreach ($berita_terbaru as $bt)
                                            <tr>
                                                <td>{{ $bt->judul }}</td>
                                                <td>{{ $bt->category->name }}</td>
                                                <td>{{ $bt->user->name }}</td>
                                                <td>
                                                    <div class="image-link">
                                                        <a href="{{ asset($bt->gambar) }}" class="btn btn-secondary" target="_blank">
                                                            <i class="fas fa-image"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" align="center">Belum ada berita yang terinput.</td>
                                        </tr>  
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Pengumuman Terbaru</h4>
                        <div class="card-header-action">
                            <a href="{{ route('pengumuman.index') }}" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Pengumuman</th>
                                        <th>Penulis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pengumuman_terbaru->count() > 0)
                                        @foreach ($pengumuman_terbaru as $pt)
                                            <tr>
                                                <td>{{ $pt->judul }}</td>
                                                <td>{{ $pt->user->name }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" align="center">Belum ada pengumuman yang terinput.</td>
                                        </tr>  
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Gallery Terbaru</h4>
                        <div class="card-header-action">
                            <a href="{{ route('gallery.index') }}" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Thumbnail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($galeri_tarbaru->count() > 0)
                                        @foreach ($galeri_tarbaru as $gt)
                                            <tr>
                                                <td>{{ $gt->title }}</td>
                                                <td>{{ $gt->user->name }}</td>
                                                <td>
                                                    <div class="image-link">
                                                        <a href="{{ asset($gt->cover) }}" class="btn btn-secondary" target="_blank">
                                                            <i class="fas fa-image"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" align="center">Belum ada pengumuman yang terinput.</td>
                                        </tr>  
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
