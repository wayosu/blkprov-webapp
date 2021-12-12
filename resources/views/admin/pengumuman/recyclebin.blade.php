@extends('layouts.admin.app', ['title' => 'Recycle Bin'])

@section('content')
    <div class="section-header">
        <h1>Recycle Bin</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('pengumuman.index') }}">Pengumuman</a></div>
            <div class="breadcrumb-item">Recycle Bin</div>
        </div>
    </div>

    <div class="section-body">
        @include('components.alert')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary mb-4"><i
                                class="fas fa-arrow-circle-left"></i> Back to Pengumuman</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-md table-bordered data-table">
                                <thead>
                                    <tr align="center">
                                        <th width="3%">#</th>
                                        <th width="35%">Pengumuman</th>
                                        <th width="30%">Tanggal Buat</th>
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
                                            <td align="center" style="vertical-align: middle">{{ $hasil->user->name }}</td>
                                            <td align="center" style="vertical-align: middle">
                                                <form action="{{ route('pengumuman.deletepermanently', $hasil->id) }}" method="POST">
                                                    <a href="{{ route('pengumuman.restore', $hasil->id) }}" class="btn btn-warning" title="Restore"><i class="fas fa-trash-restore"></i></a>
                                                    @csrf
                                                    @method('delete')
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