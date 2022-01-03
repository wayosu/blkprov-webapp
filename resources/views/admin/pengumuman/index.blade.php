@extends('layouts.admin.app', ['title' => 'Pengumuman'])

@section('content')
    <div class="section-header">
        <h1>Pengumuman</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Pengumuman</div>
        </div>
    </div>

    <div class="section-body">
        @include('components.alert')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('pengumuman.create') }}" class="btn btn-primary mb-4"><i
                                class="fas fa-plus-circle"></i> Create Pengumuman</a>
                        <a href="{{ route('pengumuman.recyclebin') }}" class="btn btn-primary mb-4"><i
                            class="fas fa-trash"></i> Recycle Bin</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-md table-bordered data-table">
                                <thead>
                                    <tr align="center">
                                        <th width="3%">#</th>
                                        <th width="30%">Pengumuman</th>
                                        <th width="30%">Tanggal Buat</th>
                                        <th width="5%">Thumbnail</th>
                                        <th width="20%">Penulis</th>
                                        <th width="12%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengumuman as $result => $hasil)
                                        <tr>
                                            <td align="center" style="vertical-align: middle">{{ $loop->iteration }}</td>
                                            <td style="vertical-align: middle">{{ $hasil->judul }}</td>                                        
                                            <td style="vertical-align: middle">{{ $hasil->created_at->isoFormat('LLLL') }}</td>      
                                            <td align="center" style="vertical-align: middle">
                                                <div class="image-link">
                                                    <a href="{{ asset($hasil->gambar) }}" class="btn btn-secondary"
                                                        target="_blank">
                                                        <i class="fas fa-image"></i>
                                                    </a>
                                                </div>
                                            </td>                                  
                                            <td align="center" style="vertical-align: middle">{{ $hasil->user->name }}</td>
                                            <td style="vertical-align: middle">
                                                <form action="{{ route('pengumuman.destroy', $hasil->id) }}" method="POST">
                                                    <a href="{{ route('pengumuman.edit', $hasil->id) }}"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin menghapus data ini?')"><i class="fas fa-trash"></i></button>
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