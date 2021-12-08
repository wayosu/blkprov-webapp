@extends('layouts.front.app', ['title' => $title . ' -'])

@section('content')
    {{-- @include('layouts.front.announc') --}}

    <section class="mb-5">
        <div class="container">
            <div class="row justify-content-center gy-5">
                <div class="col-md-12">
                    <div>
                        <h1 class="my-2">{{ $data_pengumuman->judul }}</h1>
                        <p class="text-uppercase small mb-0">
                            <span><i class="far fa-clock"></i> {{ $data_pengumuman->created_at->isoFormat('dddd, D MMMM Y') }} by</span>
                            <span class="fw-bold">{{ $data_pengumuman->user->name }}</span>
                        </p>
                        <div class="dropdown-divider"></div>
                        <article class="my-3">
                            {!! $data_pengumuman->isi !!}
                        </article>
    
                        <a href="/pengumuman" class="my-btn-backto-danger small rounded-3"><i class="fas fa-arrow-left"></i> Kembali ke pengumuman</a>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <h3 class="my-0 mb-2 mb-md-0">Pengumuman Lainnya</h3>
                            <a href="/pengumuman" class="text-decoration-none my-text-link-muted small">All</a>
                        </div>
                        <div class="dropdown-divider"></div>
                    </div>
                    <div class="row gy-3">
                        @foreach ($pengumuman_lainnya as $pl)
                            <div class="col-12 col-md-4">
                                <a href="/pengumuman/{{ $pl->slug }}" class="text-decoration-none text-black">
                                    <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                                        <div class="figure text-center rounded-0">
                                            <img class="card-img-top my-img-zoom" src="{{ asset('assets/front/images/announcement.png') }}"
                                                alt="Card image cap" style="width: 100px; height:100px; object-fit: cover;transform: scale(0.6);">
                                        </div>
                                        <div class="card-body py-3">
                                            <h5 class="card-title h5 my-card-title fw-normal text-decoration-none my-text-black">
                                                {{ $pl->judul }}
                                            </h5>
                                            <p class="fw-bold small mt-0 mb-2">
                                                <small>
                                                    @if ($pl->user_id == 1)
                                                        <small>Admin</small>
                                                    @else
                                                        <small>{{ $pl->user->name }}</small>
                                                    @endif
                                                    <small>
                                                        <span class="fw-light text-muted">-
                                                            {{ $pl->created_at->diffForHumans() }}
                                                        </span>
                                                    </small>
                                                </small>
                                            </p>
                                            <p class="m-0 text-secondary small">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($pl->isi), 150, '...') }}
                                            </p>
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
