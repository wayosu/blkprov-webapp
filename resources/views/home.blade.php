@extends('layouts.front.app', ['title' => ''])


@section('content')

@include('layouts.front.announc')
@include('layouts.front.hero')

<section id="berita" class="mb-5">
    <div class="container">
        <div class="row gy-5">
            <div class="col-md-12 col-xl-8">

                <div class="row gy-5">
                    <div class="col-12">
                        <div class="mb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="my-0">BERITA TERBARU</h6>
                                <a href="#" class="my-btn-link small text-muted"><small>All</small></a>
                            </div>
                            <div class="my-border-bottom-primary"></div>
                        </div>
                        <div class="row gy-4">
                            @foreach ($data_terbaru as $post_terbaru)
                                <div class="col-md-12 col-lg-6">
                                    <a href="#" class="text-decoration-none text-black">
                                        <div class="card border-0">
                                            <div class="figure">
                                                <img class="card-img-top rounded-3 my-img-zoom"
                                                    src="{{ asset($post_terbaru->gambar) }}" alt="Card image cap"
                                                    style="height: 25vh;object-fit: cover;">
                                            </div>
                                            <div class="my-badge-card small">
                                                <span
                                                    class="badge my-badge">{{ $post_terbaru->category->name }}</span>
                                            </div>
                                            <div class="card-body pb-0 px-0">
                                                <h4 class="card-title mb-1 my-card-title fw-normal">
                                                    {{ $post_terbaru->judul }}
                                                </h4>
                                                <p class="fw-bold small mt-0 mb-1">
                                                    <small>
                                                        @if ($post_terbaru->user_id == 1)
                                                            <small>Admin</small>
                                                        @else
                                                            <small>{{ $post_terbaru->user->name }}</small>
                                                        @endif
                                                        <small>
                                                            <span class="fw-light text-muted">-
                                                                {{ $post_terbaru->created_at->format('d F Y') }}
                                                            </span>
                                                        </small>
                                                    </small>
                                                </p>
                                                <p class="m-0 text-secondary small">
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($post_terbaru->konten), 150, '...') }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="my-0">GALERI</h6>
                                <a href="#" class="my-btn-link small text-muted"><small>All</small></a>
                            </div>
                            <div class="my-border-bottom-primary"></div>
                        </div>
                        <div class="row g-0">
                            <div class="col-12">
                                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($data_galeri as $geleri_terbaru)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <img src="{{ asset($geleri_terbaru->cover) }}" alt="foto"
                                                    class="rounded-3"
                                                    style="height: 40vh;width: 100%;object-fit: cover;">

                                                <div class="container">
                                                    <div class="carousel-caption text-start">
                                                        <div class="my-0">
                                                            <small>
                                                                <span class="badge my-badge">FOTO</span>
                                                            </small>
                                                        </div>
                                                        <h4 class="my-2 fw-normal">
                                                            {{ $geleri_terbaru->title }}
                                                        </h4>
                                                        <p class="my-0 fw-bold small">
                                                            <small>
                                                                @if ($geleri_terbaru->user_id == 1)
                                                                    <small>Admin</small>
                                                                @else
                                                                    <small>{{ $geleri_terbaru->user->name }}</small>
                                                                @endif
                                                                <small>
                                                                    <span class="fw-light">
                                                                        -
                                                                        {{ $geleri_terbaru->created_at->format('d F Y') }}
                                                                    </span>
                                                                </small>
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                                        data-bs-slide="prev">
                                        <h2 class="m-0 p-0"><span class="fas fa-angle-left"
                                                aria-hidden="true"></span></h2>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                                        data-bs-slide="next">
                                        <h2 class="m-0 p-0"><span class="fas fa-angle-right"
                                                aria-hidden="true"></span></h2>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="my-0">VIDEO PROFIL</h6>
                            </div>
                            <div class="my-border-bottom-primary"></div>
                        </div>
                        <div class="row g-0">
                            <div class="col-12">
                                <iframe style="height: 40vh;width: 100%;object-fit: cover;" class="rounded-3"
                                    src="https://www.youtube.com/embed/cHwFtCIgZnI" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-4">

                <div class="sidebar-sticky">
                    @include('layouts.front.widget')
                </div>

            </div>
        </div>
    </div>
</section>
@endsection