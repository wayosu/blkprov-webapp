@extends('layouts.front.app', ['title' => $title . ' -'])

@section('content')
    {{-- @include('layouts.front.announc') --}}

    <section class="mb-5">
        <div class="container">
            <div class="row justify-content-center gy-5">
                <div class="col-md-12">
                    <div>
                        <h1 class="my-2">{{ $data_berita->judul }}</h1>
                        <p class="text-uppercase small mb-0">
                            <span><i class="far fa-clock"></i> {{ $data_berita->created_at->isoFormat('dddd, D MMMM Y') }} by</span>
                            <span class="fw-bold">{{ $data_berita->user->name }}</span> in
                            <a href="/berita?kategori={{ $data_berita->category->slug }}" class="text-decoration-none my-text-link-danger">{{ $data_berita->category->name }}</a>
                        </p>
                        <div class="dropdown-divider"></div>
    
                        <img src="{{ asset($data_berita->gambar) }}" alt="gambar" class="img-fluid rounded-3" style="width: 100%; height: 50%; object-fit: cover; object-position: center">
                        
                        <article class="my-3">
                            {!! $data_berita->konten !!}
                        </article>
    
                        <a href="/berita" class="my-btn-backto-danger small rounded-3"><i class="fas fa-arrow-left"></i> Kembali ke berita</a>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <h3 class="my-0 mb-2 mb-md-0">Berita Lainnya</h3>
                            <a href="/berita" class="text-decoration-none my-text-link-muted small">All</a>
                        </div>
                        <div class="dropdown-divider"></div>
                    </div>
                    <div class="row gy-3">
                        @foreach ($berita_lainnya as $bl)
                            <div class="col-12 col-md-4">
                                <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                                    <div class="figure rounded-0">
                                        <img class="card-img-top my-img-zoom" src="{{ asset($bl->gambar) }}"
                                            alt="Card image cap" style="height: 25vh;object-fit: cover;">
                                    </div>
                                    <a href="/berita?kategori={{ $bl->category->slug }}"
                                        class="position-absolute px-3 my-badge py-2 small">
                                        <span class="badge rounded-0">{{ $bl->category->name }}</span>
                                    </a>
                                    <div class="card-body py-3">
                                        <a href="/berita/{{ $bl->slug }}"
                                            class="card-title h5 my-card-title fw-normal text-decoration-none my-text-black">
                                            {{ $bl->judul }}
                                        </a>
                                        <p class="fw-bold small mt-0 mb-2">
                                            <small>
                                                @if ($bl->user_id == 1)
                                                    <small>Admin</small>
                                                @else
                                                    <small>{{ $bl->user->name }}</small>
                                                @endif
                                                <small>
                                                    <span class="fw-light text-muted">-
                                                        {{ $bl->created_at->diffForHumans() }}
                                                    </span>
                                                </small>
                                            </small>
                                        </p>
                                        <p class="m-0 text-secondary small">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($bl->konten), 150, '...') }}
                                        </p>
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
