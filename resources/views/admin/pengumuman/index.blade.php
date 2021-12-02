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
                            <table class="table table-striped table-md table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th width="3%">#</th>
                                        <th width="35%">Pengumuman</th>
                                        <th width="35%">Isi</th>
                                        <th width="15%">Penulis</th>
                                        <th width="12%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengumuman as $result => $hasil)
                                        <tr>
                                            <td align="center" style="vertical-align: middle">{{ $result + $pengumuman->firstitem() }}</td>
                                            <td style="vertical-align: middle">{{ $hasil->judul }}</td>                                        
                                            <td style="vertical-align: middle">{{ \Illuminate\Support\Str::limit(strip_tags($hasil->isi), 150, '...') }}</td>                                        
                                            <td align="center" style="vertical-align: middle">{{ $hasil->user->name }}</td>
                                            <td style="vertical-align: middle">
                                                <form action="{{ route('pengumuman.destroy', $hasil->id) }}" method="POST">
                                                    <a href="{{ route('pengumuman.edit', $hasil->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin menghapus data ini?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $pengumuman->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection