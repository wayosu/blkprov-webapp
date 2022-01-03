@extends('layouts.front.app', ['title' => ''])

@section('content')
    <!-- HERO -->
    <section class="hero mt-5">
        <div class="container">
            <div class="row gy-5 align-items-center">
                <div class="col-12 col-md-7 overflow-hidden">
                    <div class="text-center">
                        <img src="{{ asset('assets/front/images/imghero.svg') }}" alt="hero-img" width="90%">
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="pengumuman d-flex py-1 mt-0">
                        <div class="px-2">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <marquee direction="left" width="100%">
                            <div class="d-flex gap-5">
                                @foreach ($data_pengumuman as $pengumuman)
                                    <a href="/pengumuman/{{ $pengumuman->slug }}" class="m-0">{{ $pengumuman->judul }}</h6></a>
                                @endforeach
                            </div>
                        </marquee>
                    </div>
                    <h1 class="py-1">
                        Menjadi
                        <br>
                        <span id="typed"></span>
                        <br>
                        Untuk
                        <br>
                        Bekerja
                    </h1>
                    <p>Ayo tingkatkan kompetensi dan daya saing dengan <br> mengikuti pelatihan yang bersertifikasi !!!</p>
                    <a href="#" class="btn-unique"><span><i class="fas fa-paper-plane"></i>&nbsp;&nbsp;Daftar
                            Pelatihan</span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO -->

    <!-- BERITA -->
    <section class="berita my-5">
        <div class="container">
            <h3 class="text-center mb-4">Berita & Informasi</h3>
            <div class="row gy-3">

                @foreach ($data_terbaru as $berita)
                    <div class="col-12 col-md-4">
                        <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                            <figure>
                                <img src="{{ asset($berita->gambar) }}" alt="img-berita" class="card-img-top">
                            </figure>
                            <div class="card-body">
                                <a href="/berita/{{ $berita->slug }}" class="card-title h5 text-decoration-none">
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
                                <a href="/berita?kategori={{ $berita->category->name }}"
                                    class="category-link text-decoration-none">{{ $berita->category->name }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- END BERITA -->

    <!-- KEJURUAN -->
    <section class="kejuruan py-2 my-5 text-center overflow-hidden">
        <div class="my-5">
            <div class="container">
                <h3 class="mb-4">Daftar Kejuruan</h3>
                <div class="kejuruan-carousel owl-carousel">
                    @foreach ($data_kejuruan as $kejuruan)                        
                        <div class="slider-item">
                            <a href="/kejuruan/{{ $kejuruan->slug }}" class="text-decoration-none">
                                <div class="bg-glass py-3 px-4">
                                    <h4 class="m-0">{{ $kejuruan->nama }}</h4>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <a href="/kejuruan" class="d-inline-block mt-4">Lihat Selengkapnya</a>
            </div>
        </div>
    </section>
    <!-- END KEJURUAN -->

    <!-- GALERI -->
    <section class="galeri my-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-7 overflow-hidden">
                    <div class="row g-1 shadow-lg galeri-scale">
                        @foreach ($first_image as $first)
                            <div class="col-12 col-md-9 overflow-hidden">
                                <img src="{{ asset($first->cover) }}" alt="img-galeri" width="100%" height="200"
                                    style="object-fit: cover;object-position: center;">
                            </div>
                        @endforeach

                        @foreach ($second_image as $second)
                        <div class="col-6 col-md-3 overflow-hidden">
                            <img src="{{ asset($second->cover) }}" alt="img-galeri" width="100%" height="200"
                                style="object-fit: cover;object-position: center;">
                        </div>
                        @endforeach

                        @foreach ($third_image as $third)
                        <div class="col-12 col-md-3 overflow-hidden">
                            <img src="{{ asset($third->cover) }}" alt="img-galeri" width="100%" height="200"
                                style="object-fit: cover;object-position: center;">
                        </div>
                        @endforeach

                        @foreach ($fourth_image as $fourth)
                        <div class="col-12 col-md-6 overflow-hidden">
                            <img src="{{ asset($fourth->cover) }}" alt="img-galeri" width="100%" height="200"
                                style="object-fit: cover;object-position: center;">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <h1 class="mt-0 mb-3">Galeri<br>Kegiatan</h1>
                    <p>Galeri terkait kegiatan yang dilaksanakan oleh<br>BLK Gorontalo.</p>
                    <a href="/galeri"><span><i class="fas fa-images"></i> Lihat Galeri</span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- END GALERI -->
@endsection
