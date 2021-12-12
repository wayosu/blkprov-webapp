@extends('layouts.front.app', ['title' => $title . ' -'])

@section('content')
    <section class="mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="mb-3">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <h3 class="my-0 mb-2 mb-md-0">Kejuruan</h3>
                            <form action="/kejuruan">
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
                        @if ($data_kejuruan->count())
                            @foreach ($data_kejuruan as $kejuruan)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                                        <div class="figure rounded-0">
                                            <img class="card-img-top my-img-zoom" src="{{ asset($kejuruan->gambar) }}"
                                                alt="Card image cap" style="height: 25vh;object-fit: cover;">
                                        </div>
                                        <div class="card-body py-3">
                                            <h5 class="card-title mb-1 my-card-title fw-normal">
                                                {{ $kejuruan->nama }}
                                            </h5>
                                            <button role="button" data-bs-toggle="modal"
                                                data-bs-target="#info{{ $kejuruan->id }}" class="btn btn-sm my-btn-info">
                                                <i class="fas fa-info-circle"></i>
                                            </button>
                                            <div class="img-link-popup d-inline">
                                                <a href="{{ asset($kejuruan->gambar) }}" target="_blank" class="ms-1 btn btn-sm my-btn-info">
                                                    <i class="fas fa-image"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="info{{ $kejuruan->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body overflow-hidden">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="card-title mb-1 my-card-title fw-normal">
                                                        {{ $kejuruan->nama }}
                                                    </h5>
                                                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="dropdown-divider"></div>
                                                <article class="my-0">
                                                    {!! $kejuruan->deskripsi !!}
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="mt-5 text-center fs-6">Kejuruan tidak ditemukan.</p>
                        @endif
                    </div>
                    {{ $data_kejuruan->links() }}
                </div>
            </div>

            <div class="row gy-5 mb-5">
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

            <div class="row gy-5 mb-5">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <h5 class="my-0 mb-2 mb-md-0">Berita Terbaru</h5>
                            <a href="/berita" class="text-decoration-none my-text-link-muted small"><small>All</small></a>
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

            <div class="row gy-5 mb-5">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <h5 class="my-0 mb-2 mb-md-0">Galeri Terbaru</h5>
                            <a href="/galeri" class="text-decoration-none my-text-link-muted small"><small>All</small></a>
                        </div>
                        <div class="dropdown-divider"></div>
                    </div>
                    <div class="row gy-3">
                        <div class="col-12">
                            @include('layouts.front.widget_galeri2')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
