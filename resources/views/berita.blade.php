@extends('layouts.front.app', ['title' => $title . ' -'])

@section('content')
    <!-- CONTENT -->
    <section class="content">
        <div class="bg-header" style="background-image: url({{ asset('assets/front/images/bg5.jpg') }});">
            <div class="container">
                <div class="page-title-content">
                    <div class="page-title">
                        <h3 class="m-0">{{ $title }}</h3>
                    </div>
                    <div class="page-breadcrumbs">
                        <a href="/">Home</a>
                        <span>/</span>
                        <a class="current">{{ $title }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-items">
            <div class="container">
                <div class="berita">
                    <div class="d-flex flex-column flex-md-row mb-3 gap-2 justify-content-between align-items-center overflow-hidden">

                        <a href="/kategori" class="btn btn-kategori w-25"><span>All Kategori</span></a>

                        <form action="/berita" class="w-100">
                            @if (request('kategori'))
                                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                            @endif
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Search..."
                                    name="search" value="{{ request('search') }}">
                                <button type="submit" class="btn btn-search-theme text-white"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </form>

                    </div>
                    <div class="row gy-3">

                        @if ($data_berita->count())
                            @foreach ($data_berita as $berita)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                                        <figure>
                                            <img src="{{ asset($berita->gambar) }}" alt="img-berita"
                                                class="card-img-top">
                                        </figure>
                                        <div class="card-body">
                                            <a href="/berita/{{ $berita->slug }}"
                                                class="card-title h5 text-decoration-none">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($berita->judul), 60, '...') }}
                                            </a>
                                            <p class="my-1 small text-muted">
                                                @if ($berita->user_id == 1)
                                                    <span class="fw-bolder text-black">Admin</span>
                                                @else
                                                    <span class="fw-bolder text-black">{{ $berita->user->name }}</span>
                                                @endif
                                                - {{ $berita->created_at->diffForHumans() }}
                                            </p>
                                            <a href="/berita?kategori={{ $berita->category->slug }}"
                                                class="category-link text-decoration-none">{{ $berita->category->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="mt-5 text-center fs-6">Berita tidak ditemukan.</p>
                        @endif

                    </div>

                    <div class="mt-4">
                        {{ $data_berita->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTENT -->
@endsection
