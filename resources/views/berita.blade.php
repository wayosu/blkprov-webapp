@extends('layouts.front.app', ['title' => 'Berita -'])

@section('content')
    {{-- @include('layouts.front.announc') --}}

    <section class="mb-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="mb-2">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <h3 class="my-0 mb-2 mb-md-0">Berita</h3>
                            <form action="/berita">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Search..." name="search" value="{{ request('search') }}">
                                    <button type="submit" class="btn my-bg-primary text-white"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row g-4 mb-4">
                        @if ($data_berita->count())
                            @foreach ($data_berita as $berita)
                                <div class="col-md-12 col-lg-4">
                                    <a href="/berita/{{ $berita->slug }}" class="text-decoration-none text-black">
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
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p class="mt-5 text-center fs-6">Berita tidak ditemukan.</p>
                        @endif
                    </div>
                    {{-- {{ $data_berita->links() }} --}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="dropdown-divider"></div>
                    <div class="row g-4 mb-4">
                        <div class="col-12">
                            {{-- @include('layouts.front.widget_galeri') --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
