@extends('layouts.admin.app', ['title' => 'Create Instruktor'])

@section('content')
    <div class="section-header">
        <h1>Create Instruktor</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('instruktor.index') }}">Instruktor</a></div>
            <div class="breadcrumb-item">Create Instruktor</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('instruktor.index') }}" class="btn btn-secondary mb-4"><i
                                class="fas fa-arrow-circle-left"></i> Back to Instruktor</a>

                        <form action="{{ route('instruktor.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror">
                                @error('nip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenis Diklat</label>
                                <select name="kejuruan_id" class="form-control select2">
                                    <option value="" disabled selected>Pilih Jenis Diklat</option>
                                    @foreach ($kejuruan as $result)
                                        <option value="{{ $result->id }}">{{ $result->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tahun Diklat</label>
                                <input type="text" name="tahun_diklat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Penempatan</label>
                                <input type="text" name="penempatan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection