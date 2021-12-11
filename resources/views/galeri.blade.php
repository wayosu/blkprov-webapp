@extends('layouts.front.app', ['title' => 'Galeri -'])

@section('content')
    {{-- @include('layouts.front.announc') --}}

    <section class="mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="mb-3">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <h3 class="my-0 mb-2 mb-md-0">Galeri</h3>
                            <form action="/galeri">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Search..."
                                        name="search" value="{{ request('search') }}">
                                    <button type="submit" class="btn my-bg-primary text-white"><i
                                            class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="dropdown-divider"></div>
                    </div>

                    <div class="row g-4 mb-4">
                        @if ($data_galeri->count())
                            @foreach ($data_galeri as $galeri)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                                        <div class="figure rounded-0">
                                            <img class="card-img-top my-img-zoom" src="{{ asset($galeri->cover) }}"
                                                alt="Card image cap" style="height: 25vh;object-fit: cover;">
                                        </div>
                                        <div class="position-absolute px-3 my-badge py-2 small">
                                            <span class="badge rounded-0">Foto</span>
                                        </div>
                                        <div class="card-body py-3">
                                            <a href="/galeri/{{ $galeri->slug }}"
                                                class="card-title h5 my-card-title fw-normal text-decoration-none my-text-black">
                                                {{ $galeri->title }}
                                            </a>
                                            <p class="fw-bold small mt-0 mb-2">
                                                <small>
                                                    @if ($galeri->user_id == 1)
                                                        <small>Admin</small>
                                                    @else
                                                        <small>{{ $galeri->user->name }}</small>
                                                    @endif
                                                    <small>
                                                        <span class="fw-light text-muted">-
                                                            {{ $galeri->created_at->diffForHumans() }}
                                                        </span>
                                                    </small>
                                                </small>
                                            </p>
                                            <p class="m-0 text-secondary small">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($galeri->body), 150, '...') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="mt-5 text-center fs-6">Galeri tidak ditemukan.</p>
                        @endif
                    </div>
                    {{ $data_galeri->links() }}
                </div>
            </div>

            <div class="row gy-5 mb-5">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <h5 class="my-0 mb-2 mb-md-0">Berita Terbaru</h5>
                            <a href="/kategori" class="text-decoration-none my-text-link-muted small"><small>All</small></a>
                        </div>
                        <div class="dropdown-divider"></div>
                    </div>
                    <div class="row gy-3">
                        <div class="col-12">
                            @include('layouts.front.widget_berita2')
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
