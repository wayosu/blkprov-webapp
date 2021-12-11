@extends('layouts.front.app', ['title' => 'Pengumuman -'])

@section('content')
    <section class="mb-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="mb-3">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <h3 class="my-0 mb-2 mb-md-0">Pengumuman</h3>
                            <form action="/pengumuman">
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
                    <div class="row gy-4 mb-4">
                        @if ($data_pengumuman->count())
                            @foreach ($data_pengumuman as $pengumuman)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <a href="/pengumuman/{{ $pengumuman->slug }}" class="text-decoration-none text-black">
                                        <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                                            <div class="figure text-center rounded-0">
                                                <img class="card-img-top rounded-3 my-img-zoom"
                                                    src="{{ asset('assets/front/images/announcement.png') }}" alt="Card image cap"
                                                    style="width: 100px; height:100px; object-fit: cover;transform: scale(0.6);">
                                            </div>
                                            <div class="card-body py-3">
                                                <h5 class="card-title mb-1 my-card-title fw-normal">
                                                    {{ $pengumuman->judul }}
                                                </h5>
                                                <p class="fw-bold small mt-0 mb-1">
                                                    <small>
                                                        @if ($pengumuman->user_id == 1)
                                                            <small>Admin</small>
                                                        @else
                                                            <small>{{ $pengumuman->user->name }}</small>
                                                        @endif
                                                        <small>
                                                            <span class="fw-light text-muted">-
                                                                {{ $pengumuman->created_at->diffForHumans() }}
                                                            </span>
                                                        </small>
                                                    </small>
                                                </p>
                                                <p class="m-0 text-secondary small">
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($pengumuman->isi), 150, '...') }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p class="mt-5 text-center fs-6">Pengumuman tidak ditemukan.</p>
                        @endif
                    </div>
                    {{ $data_pengumuman->links() }}
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
        </div>
    </section>
@endsection
