@extends('layouts.front.app', ['title' => 'Galeri -'])

@section('content')
    @include('layouts.front.announc')

    <section class="mb-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="mb-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="my-0">Galeri</h3>
                        </div>
                    </div>
                    <div class="row g-4 mb-4">
                        @foreach ($data_galeri as $galeri)
                            <div class="col-md-12 col-lg-4">
                                <a href="#" class="text-decoration-none text-black">
                                    <div class="card border-0">
                                        <div class="figure">
                                            <img class="card-img-top rounded-3 my-img-zoom"
                                                src="{{ asset($galeri->cover) }}" alt="Card image cap"
                                                style="height: 25vh;object-fit: cover;">
                                        </div>
                                        <div class="my-badge-card small">
                                            <span class="badge my-badge">Foto</span>
                                        </div>
                                        <div class="card-body pb-0 px-0">
                                            <h4 class="card-title mb-1 my-card-title fw-normal">
                                                {{ $galeri->title }}
                                            </h4>
                                            <p class="fw-bold small mt-0 mb-1">
                                                <small>
                                                    @if ($galeri->user_id == 1)
                                                        <small>Admin</small>
                                                    @else
                                                        <small>{{ $galeri->user->name }}</small>
                                                    @endif
                                                    <small>
                                                        <span class="fw-light text-muted">-
                                                            {{ $galeri->created_at->format('d F Y') }}
                                                        </span>
                                                    </small>
                                                </small>
                                            </p>
                                            <p class="m-0 text-secondary small">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($galeri->body), 150, '...') }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{ $data_galeri->links() }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="dropdown-divider"></div>
                    <div class="row g-4 mb-4">
                        <div class="col-12">
                            @include('layouts.front.widget_berita')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
