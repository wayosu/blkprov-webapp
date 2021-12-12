@extends('layouts.front.app', ['title' => 'Profil -'])

@section('content')
    <section class="mb-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="my-0">Profil</h3>
                        </div>
                        <div class="dropdown-divider"></div>
                    </div>
                    <article class="small" style="text-align: justify">{!! $data_profile->profile !!}</article>
                </div>
            </div>

            <div class="row gy-5 mb-5">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <h5 class="my-0 mb-2 mb-md-0">Pengumuman Terbaru</h5>
                            <a href="/pengumuman" class="text-decoration-none my-text-link-muted small"><small>All</small></a>
                        </div>
                        <div class="dropdown-divider"></div>
                    </div>
                    @include('layouts.front.widget_pengumuman')
                </div>
            </div>

            <div class="row gy-5">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <h5 class="my-0 mb-2 mb-md-0">Berita Terbaru</h5>
                            <a href="/berita" class="text-decoration-none my-text-link-muted small"><small>All</small></a>
                        </div>
                        <div class="dropdown-divider"></div>
                    </div>
                    <div class="row gy-3">
                        <div class="col-12">
                            @include('layouts.front.widget_berita')
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <h5 class="my-0 mb-2 mb-md-0">Galeri Terbaru</h5>
                            <a href="/galeri" class="text-decoration-none my-text-link-muted small"><small>All</small></a>
                        </div>
                        <div class="dropdown-divider"></div>
                    </div>
                    <div class="row gy-3">
                        <div class="col-12">
                            @include('layouts.front.widget_galeri')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
