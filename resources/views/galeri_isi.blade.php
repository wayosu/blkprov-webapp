@extends('layouts.front.app', ['title' => $title . ' -'])

@section('content')
    {{-- @include('layouts.front.announc') --}}

    <section class="mb-5">
        <div class="container">
            <div class="row justify-content-center gy-5">
                <div class="col-md-12">
                    <div>
                        <h1 class="my-2">{{ $data_galeri->title }}</h1>
                        <p class="text-uppercase small mb-0">
                            <span><i class="far fa-clock"></i>
                                {{ $data_galeri->created_at->isoFormat('dddd, D MMMM Y') }} by</span>
                            <span class="fw-bold">{{ $data_galeri->user->name }}</span>
                        </p>
                        <div class="dropdown-divider"></div>

                        <img src="{{ asset($data_galeri->cover) }}" alt="gambar" class="img-fluid rounded-3"
                            style="width: 100%; height: 50%; object-fit: cover; object-position: center">

                        <article class="my-3">
                            {!! $data_galeri->body !!}
                        </article>

                        @if (count($data_galeri->images) > 0)
                            <h5>Foto Terkait</h5>
                            <div class="d-flex flex-row flex-nowrap my-overflow-x mt-1 mb-4">
                                @foreach ($data_galeri->images as $img)
                                    <div class="img-link-popup">
                                        <a href="{{ asset($img->image) }}" target="_blank">
                                            <img src="{{ asset($img->image) }}" alt="" class="rounded-3 me-1"
                                                style="width: 300px;height: 180px;object-fit: cover;">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <a href="/berita" class="my-btn-backto-danger small rounded-3"><i class="fas fa-arrow-left"></i>
                            Kembali ke galeri</a>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <h3 class="my-0 mb-2 mb-md-0">Galeri Lainnya</h3>
                            <a href="/galeri" class="text-decoration-none my-text-link-muted small">All</a>
                        </div>
                        <div class="dropdown-divider"></div>
                    </div>
                    <div class="row gy-3">
                        @foreach ($galeri_lainnya as $gl)
                            <div class="col-12 col-md-4">
                                <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                                    <div class="figure rounded-0">
                                        <img class="card-img-top my-img-zoom" src="{{ asset($gl->cover) }}"
                                            alt="Card image cap" style="height: 25vh;object-fit: cover;">
                                    </div>
                                    <div class="position-absolute px-3 my-badge py-2 small">
                                        <span class="badge rounded-0">Foto</span>
                                    </div>
                                    <div class="card-body py-3">
                                        <a href="/galeri/{{ $gl->slug }}"
                                            class="card-title h5 my-card-title fw-normal text-decoration-none my-text-black">
                                            {{ $gl->title }}
                                        </a>
                                        <p class="fw-bold small mt-0 mb-2">
                                            <small>
                                                @if ($gl->user_id == 1)
                                                    <small>Admin</small>
                                                @else
                                                    <small>{{ $gl->user->name }}</small>
                                                @endif
                                                <small>
                                                    <span class="fw-light text-muted">-
                                                        {{ $gl->created_at->diffForHumans() }}
                                                    </span>
                                                </small>
                                            </small>
                                        </p>
                                        <p class="m-0 text-secondary small">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($gl->body), 150, '...') }}
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
