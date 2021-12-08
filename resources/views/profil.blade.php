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

            <div class="row gy-5">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <h5 class="my-0 mb-2 mb-md-0">Pengumuman Terbaru</h5>
                            <a href="/pengumuman" class="text-decoration-none my-text-link-muted small"><small>All</small></a>
                        </div>
                        <div class="dropdown-divider"></div>
                    </div>
                    <div class="row gy-3">
                        @foreach ($data_pengumuman as $galeri)
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                                    <div class="card-body py-3">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-3 col-lg-2 col-xl-3">
                                                <div class="figure">
                                                    <img class="img-fluid rounded-3"
                                                        src="{{ asset('assets/front/images/announcement.png') }}"
                                                        alt="Card image cap"
                                                        style="height: 6vh;width: 100%;object-fit: cover;">
                                                </div>
                                            </div>
                                            <div class="col-9 col-lg-10 col-xl-9">
                                                <div class="card-body">
                                                    <a href="/pengumuman/{{ $galeri->slug }}"
                                                        class="card-title h6 my-card-title mt-0 mb-1 small text-decoration-none">
                                                        {{ $galeri->judul }}</a>
                                                    <div class="small fw-bold my-badge-card-small">
                                                        <small>
                                                            <span class="fw-light m-0 mt-0 small text-muted">
                                                                {{ $galeri->created_at->diffForHumans() }}
                                                            </span>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
