@extends('layouts.front.app', ['title' => $title . ' -'])

@section('content')
    {{-- @include('layouts.front.announc') --}}

    <section class="mb-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="my-0">Kategori</h3>
                            <a href="/berita" class="text-decoration-none my-btn-backto-danger px-2 py-1 small rounded-3"><small><i class="fas fa-arrow-left"></i> Kembali ke berita</small></a>
                        </div>
                        <div class="dropdown-divider"></div>
                    </div>
                    <div class="row gy-3">
                        @foreach ($data_kategori as $kategori)
                            <div class="col-12 col-md-4 col-lg-3">
                                <a href="/berita?kategori={{ $kategori->slug }}" class="my-kate">
                                    <div class="card rounded-3 text-white">
                                        <img src="https://source.unsplash.com/500x500?{{ $kategori->name }}" alt="cover"
                                            class="card-img" style="height: 300px;object-fit: cover;object-position: center;">
                                        <div class="card-img-overlay d-flex align-items-center p-0">
                                            <h5 class="card-title text-center flex-fill p-4 my-fillbg-kate">
                                                {{ $kategori->name }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
