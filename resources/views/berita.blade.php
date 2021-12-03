@extends('layouts.front.app', ['title' => 'Berita -'])

@section('content')
    @include('layouts.front.announc')

    <section class="mb-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="mb-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="my-0">Berita</h3>
                        </div>
                    </div>
                    <div class="row g-4 mb-4">
                        @foreach ($data_berita as $berita)
                            <div class="col-md-12 col-lg-4">
                                <a href="#" class="text-decoration-none text-black">
                                    <div class="card border-0">
                                        <div class="figure">
                                            <img class="card-img-top rounded-3 my-img-zoom"
                                                src="{{ asset($berita->gambar) }}" alt="Card image cap"
                                                style="height: 25vh;object-fit: cover;">
                                        </div>
                                        <div class="my-badge-card small">
                                            <span class="badge my-badge">{{ $berita->category->name }}</span>
                                        </div>
                                        <div class="card-body pb-0 px-0">
                                            <h4 class="card-title mb-1 my-card-title fw-normal">
                                                {{ $berita->judul }}
                                            </h4>
                                            <p class="fw-bold small mt-0 mb-1">
                                                <small>
                                                    @if ($berita->user_id == 1)
                                                        <small>Admin</small>
                                                    @else
                                                        <small>{{ $berita->user->name }}</small>
                                                    @endif
                                                    <small>
                                                        <span class="fw-light text-muted">-
                                                            {{ $berita->created_at->format('d F Y') }}
                                                        </span>
                                                    </small>
                                                </small>
                                            </p>
                                            <p class="m-0 text-secondary small">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($berita->konten), 150, '...') }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{ $data_berita->links() }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="dropdown-divider"></div>
                    <div class="row g-4 mb-4">
                        <div class="col-12">
                            @include('layouts.front.widget_galeri')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
