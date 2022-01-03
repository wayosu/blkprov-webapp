@extends('layouts.front.app', ['title' => 'Galeri -'])

@section('content')
<!-- CONTENT -->
<section class="content">
    <div class="bg-header" style="background-image: url({{ asset('assets/front/images/bg5.jpg') }});">
        <div class="container">
            <div class="page-title-content">
                <div class="page-title">
                    <h3 class="m-0">Galeri</h3>
                </div>
                <div class="page-breadcrumbs">
                    <a href="/">Home</a>
                    <span>/</span>
                    <a class="current">Galeri</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-items">
        <div class="container">
            <div class="berita">
                <div class="d-flex flex-column flex-md-row mb-3 gap-2 justify-content-between align-items-center overflow-hidden">
                    <form action="/galeri" class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Search..."
                                name="search" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-search-theme text-white"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="row gy-3">

                    @if ($data_galeri->count())
                        @foreach ($data_galeri as $galeri)
                            <div class="col-12 col-md-4">
                                <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                                    <figure>
                                        <img src="{{ asset($galeri->cover) }}" alt="img-berita" class="card-img-top">
                                    </figure>
                                    <div class="card-body">
                                        <a href="/galeri/{{ $galeri->slug }}" class="card-title h5 text-decoration-none">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($galeri->title), 60, '...') }}
                                        </a>
                                        <p class="my-1 small text-muted">
                                            @if ($galeri->user_id == 1)
                                                <span class="fw-bolder text-black">Admin</span>
                                            @else
                                                <span class="fw-bolder text-black">{{ $galeri->user->name }}</span>
                                            @endif
                                            - {{ $galeri->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="mt-5 text-center fs-6">Galeri tidak ditemukan.</p>
                    @endif
                </div>

                <div class="mt-4">
                    {{ $data_galeri->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CONTENT -->
@endsection