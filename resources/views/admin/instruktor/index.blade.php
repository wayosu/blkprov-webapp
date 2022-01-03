@extends('layouts.admin.app', ['title' => 'Instruktor'])

@section('content')
    <div class="section-header">
        <h1>Instruktor</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Instruktor</div>
        </div>
    </div>

    <div class="section-body">
        @include('components.alert')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('instruktor.create') }}" class="btn btn-primary mb-4"><i
                                class="fas fa-plus-circle"></i> Create Instruktor</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-md table-bordered data-table">
                                <thead>
                                    <tr align="center">
                                        <th width="2%">#</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Jenis Diklat</th>
                                        <th>Tahun Diklat</th>
                                        <th>Penempatan</th>
                                        <th>Ket</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instruktor as $result => $hasil)
                                        <tr>
                                            <td align="center" style="vertical-align: middle">{{ $loop->iteration }}</td>
                                            <td style="vertical-align: middle">{{ $hasil->nama }}</td>                                       
                                            <td style="vertical-align: middle">{{ $hasil->nip }}</td>                                       
                                            <td style="vertical-align: middle">{{ $hasil->kejuruan->nama }}</td>                                        
                                            <td style="vertical-align: middle">{{ $hasil->tahun_diklat }}</td>                                        
                                            <td style="vertical-align: middle">{{ $hasil->penempatan }}</td>                                        
                                            <td style="vertical-align: middle">{{ $hasil->keterangan }}</td>                                        
                                            <td style="vertical-align: middle">
                                                <form action="{{ route('instruktor.destroy', $hasil->id) }}" method="POST">
                                                    <a href="{{ route('instruktor.edit', $hasil->id) }}"
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