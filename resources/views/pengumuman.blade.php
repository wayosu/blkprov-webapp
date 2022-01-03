@extends('layouts.front.app', ['title' => 'Pengumuman -'])

@section('content')
<!-- CONTENT -->
<section class="content">
    <div class="bg-header" style="background-image: url({{ asset('assets/front/images/bg5.jpg') }});">
        <div class="container">
            <div class="page-title-content">
                <div class="page-title">
                    <h3 class="m-0">Pengumuman</h3>
                </div>
                <div class="page-breadcrumbs">
                    <a href="/">Home</a>
                    <span>/</span>
                    <a class="current">Pengumuman</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-items">
        <div class="container">
            <div class="berita">
                <div class="d-flex flex-column flex-md-row mb-3 gap-2 justify-content-between align-items-center overflow-hidden">
                    <form action="/pengumuman" class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Search..."
                                name="search" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-search-theme text-white"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="row gy-3">
                    @if ($data_pengumuman->count())
                        @foreach ($data_pengumuman as $pengumuman)
                            <div class="col-12 col-md-4">
                                <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                                    <figure>
                                        <img src="assets/images/2.jpg" alt="img-berita" class="card-img-top">
                                    </figure>
                                    <div class="card-body">
                                        <a href="/pengumuman/{{ $pengumuman->slug }}" class="card-title h5 text-decoration-none">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($pengumuman->judul), 60, '...') }}
                                        </a>
                                        <p class="my-1 small text-muted">
                                            @if ($pengumuman->user_id == 1)
                                                <span class="fw-bolder text-black">Admin</span>
                                            @else
                                                <span class="fw-bolder text-black">{{ $pengumuman->user->name }}</span>
                                            @endif
                                            - {{ $pengumuman->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="mt-5 text-center fs-6">Pengumuman tidak ditemukan.</p>
                    @endif
                </div>

                <div class="mt-4">
                    {{ $data_pengumuman->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CONTENT -->
@endsection