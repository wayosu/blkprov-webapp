@extends('layouts.front.app', ['title' => $title . ' -'])

@section('content')
    {{-- @include('layouts.front.announc') --}}

    <section class="mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="mb-3">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <h3 class="my-0 mb-2 mb-md-0">{{ $title }}</h3>
                            <form action="/berita">
                                @if (request('kategori'))
                                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                                @endif
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
                        @if ($data_berita->count())
                            @foreach ($data_berita as $berita)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                                        <div class="figure rounded-0">
                                            <img class="card-img-top my-img-zoom" src="{{ asset($berita->gambar) }}"
                                                alt="Card image cap" style="height: 25vh;object-fit: cover;">
                                        </div>
                                        <a href="/berita?kategori={{ $berita->category->slug }}"
                                            class="position-absolute px-3 my-badge py-2 small">
                                            <span class="badge rounded-0">{{ $berita->category->name }}</span>
                                        </a>
                                        <div class="card-body py-3">
                                            <a href="/berita/{{ $berita->slug }}"
                                                class="card-title h5 my-card-title fw-normal text-decoration-none my-text-black">
                                                {{ $berita->judul }}
                                            </a>
                                            <p class="fw-bold small mt-0 mb-2">
                                                <small>
                                                    @if ($berita->user_id == 1)
                                                        <small>Admin</small>
                                                    @else
                                                        <small>{{ $berita->user->name }}</small>
                                                    @endif
                                                    <small>
                                                        <span class="fw-light text-muted">-
                                                            {{ $berita->created_at->diffForHumans() }}
                                                        </span>
                                                    </small>
                                                </small>
                                            </p>
                                            <p class="m-0 text-secondary small">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($berita->konten), 150, '...') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="mt-5 text-center fs-6">Berita tidak ditemukan.</p>
                        @endif
                    </div>
                    {{ $data_berita->links() }}
                </div>
            </div>

            <div class="row gy-5 mb-5">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <h5 class="my-0 mb-2 mb-md-0">Kategori Terbaru</h5>
                            <a href="/kategori" class="text-decoration-none my-text-link-muted small"><small>All</small></a>
                        </div>
                        <div class="dropdown-divider"></div>
                    </div>
                    <div class="row gy-3">
                        @foreach ($data_kategori as $kategori)
                            <div class="col-12 col-md-6">
                                <a href="/berita?kategori={{ $kategori->slug }}" class="my-kate">
                                    <div class="card rounded-3 text-white">
                                        <img src="https://source.unsplash.com/500x500?{{ $kategori->name }}" alt="cover"
                                            class="card-img"
                                            style="height: 140px;object-fit: cover;object-position: center;">
                                        <div class="card-img-overlay d-flex align-items-center p-0">
                                            <h6 class="card-title text-center flex-fill p-3 m-0 my-fillbg-kate">
                                                {{ $kategori->name }}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
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
                    @include('layouts.front.widget_pengumuman')
                </div>
            </div>
        </div>
    </section>
@endsection
