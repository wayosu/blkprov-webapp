@extends('layouts.admin.app', ['title' => 'Sub Kejuruan'])

@section('content')
    <div class="section-header">
        <h1>Sub Kejuruan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Sub Kejuruan</div>
        </div>
    </div>

    <div class="section-body">
        @include('components.alert')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('subkejuruan.create') }}" class="btn btn-primary mb-4"><i
                                class="fas fa-plus-circle"></i> Create Sub Kejuruan</a>
                        <a href="{{ route('kejuruan.index') }}" class="btn btn-primary mb-4"><i
                                    class="fas fa-shapes"></i> Kejuruan</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-md table-bordered data-table">
                                <thead>
                                    <tr align="center">
                                        <th width="3%">#</th>
                                        <th width="35%">Kejuruan</th>
                                        <th width="35%">Nama Sub</th>
                                        <th width="35%">Kurikulum</th>
                                        <th width="20%">Gambar</th>
                                        <th width="12%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($kejuruan as $result => $hasil)
                                        <tr>
                                            <td align="center" style="vertical-align: middle">{{ $loop->iteration }}</td>
                                            <td style="vertical-align: middle">{{ $hasil->nama }}</td>                                        
                                            <td style="vertical-align: middle">
                                                <div class="image-link">
                                                    <a href="{{ asset($hasil->gambar) }}" class="btn btn-secondary" target="_blank">
                                                        <i class="fas fa-image"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle">
                                                <form action="{{ route('kejuruan.destroy', $hasil->id) }}" method="POST">
                                                    <a href="{{ route('kejuruan.edit', $hasil->id) }}"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin menghapus data ini?')"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection