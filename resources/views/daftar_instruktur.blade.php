@extends('layouts.front.app', ['title' => $title . ' -'])

@section('content')
<!-- CONTENT -->
<section class="content">
    <div class="bg-header" style="background-image: url({{ asset('assets/front/images/bg5.jpg') }});">
        <div class="container">
            <div class="page-title-content">
                <div class="page-title">
                    <h3 class="m-0">{{ $title }}</h3>
                </div>
                <div class="page-breadcrumbs">
                    <a href="/">Home</a>
                    <span>/</span>
                    <a href="#">Profil</a>
                    <span>/</span>
                    <a class="current">{{ $title }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-items">
        <div class="container">
            <div class="row flex-column-reverse flex-md-row gap-5 gap-md-0">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Jenis Diklat</th>
                                    <th>Tahun Diklat</th>
                                    <th>Penempatan</th>
                                    <th>Ket</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data_instruktur->count())
                                    @foreach ($data_instruktur as $instruktur)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $instruktur->nama }}</td>
                                        <td>{{ $instruktur->nip }}</td>
                                        <td>{{ $instruktur->kejuruan->nama }}</td>
                                        <td>{{ $instruktur->tahun_diklat }}</td>
                                        <td>{{ $instruktur->penempatan }}</td>
                                        <td>{{ $instruktur->keterangan }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr align="center">Data Instruktur belum diinput.</tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CONTENT -->
@endsection