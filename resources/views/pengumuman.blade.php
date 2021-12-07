@extends('layouts.front.app', ['title' => 'Pengumuman -'])

@section('content')
    <section class="mb-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="mb-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="my-0">Pengumuman</h3>
                        </div>
                    </div>
                    <div class="row g-4 mb-4">
                        @foreach ($data_pengumuman as $pengumuman)
                            <div class="col-md-12 col-lg-3">
                                <a href="#" class="text-decoration-none text-black">
                                    <div class="card border-0">
                                        <div class="figure text-center">
                                            <img class="card-img-top rounded-3 my-img-zoom"
                                                src="{{ asset('assets/front/images/announcement.png') }}" alt="Card image cap"
                                                style="width: 200px; height: 200px; object-fit: cover;">
                                        </div>
                                        <div class="card-body pb-0 px-0">
                                            <h4 class="card-title mb-1 my-card-title fw-normal">
                                                {{ $pengumuman->judul }}
                                            </h4>
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
                    </div>
                    {{ $data_pengumuman->links() }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="dropdown-divider"></div>
                    <div class="row g-4 mb-4">
                        <div class="col-12 col-md-6">
                            @include('layouts.front.widget_berita')
                        </div>
                        <div class="col-12 col-md-6">
                            @include('layouts.front.widget_galeri')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
