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
                    <a href="/pengumuman">Pengumuman</a>
                    <span>/</span>
                    <a class="current">{{ $title }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-items">
        <div class="container">
            <div class="isi-berita">
                <div class="row gy-5">
                    <div class="col-12 col-lg-8">
                        <div class="header-berita">
                            <h3 class="m-0 title-berita">{{ $data_pengumuman->judul }}</h3>
                            <div class="d-flex align-items-center mt-2 mb-4 date-berita">
                                <p class="m-0">{{  $data_pengumuman->created_at->isoFormat('LLLL')  }} by
                                    {{ $data_pengumuman->user->name }}</p>
                            </div>
                            <img src="assets/images/2.jpg" alt="pengumuman-img" class="img-berita">
                        </div>
                        <div class="body-berita mt-4">
                            <article>
                                {!! $data_pengumuman->isi !!}
                            </article>
                        </div>
                        <div class="footer-berita my-4">
                            <div class="btn-share-berita">
                                <span><i class="fas fa-share-alt"></i> SHARE</span>
                                <div class="btn-share-container">
                                    <a href="#" id="facebook-btn" target="_BLANK"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" id="twitter-btn" target="_BLANK"><i class="fab fa-twitter"></i></a>
                                    <a href="#" id="whatsapp-btn" target="_BLANK"><i class="fab fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">

                        <div class="sidebar">
                            <div class="row gy-5">
                                <div class="col-12 col-md-6 col-lg-12">
                                    <div class="pengumuman-terbaru">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="fw-bold m-0">BERITA TERBARU</h5>
                                            <a href="/berita" class="text-decoration-none" style="font-size: 12px !important;">All</a>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <div class="d-flex gap-3 flex-column">

                                            @foreach ($data_berita as $berita)
                                                <div class="card border-0 shadow-sm overflow-hidden">
                                                    <div class="card-body p-0">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-5">
                                                                <img src="{{ asset($berita->gambar) }}" alt="" class="img-sidebar">
                                                            </div>
                                                            <div class="col-12 col-lg-7">
                                                                <div class="py-2">
                                                                    <a href="/berita/{{ $berita->slug }}" class="h6 text-decoration-none">{{ \Illuminate\Support\Str::limit(strip_tags($berita->judul), 60, '...') }}</a>
                                                                    <p class="m-0">{{ $berita->created_at->diffForHumans() }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12">
                                    <div class="galeri-terbaru">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="fw-bold m-0">GALERI TERBARU</h5>
                                            <a href="/galeri" class="text-decoration-none" style="font-size: 12px !important;">All</a>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <div class="d-flex gap-3 flex-column">
                                            
                                            @foreach ($data_galeri as $galeri)    
                                                <div class="card border-0 shadow-sm overflow-hidden">
                                                    <div class="card-body p-0">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-5">
                                                                <img src="{{ asset($galeri->cover) }}" alt="" class="img-sidebar">
                                                            </div>
                                                            <div class="col-12 col-lg-7">
                                                                <div class="py-2">
                                                                    <a href="/galeri/{{ $galeri->slug }}" class="h6 text-decoration-none">{{ \Illuminate\Support\Str::limit(strip_tags($galeri->title), 60, '...') }}</a>
                                                                    <p class="m-0">{{ $galeri->created_at->diffForHumans() }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CONTENT -->

<script>
    const facebookBtn = document.getElementById('facebook-btn');
    const twitterBtn = document.getElementById('twitter-btn');
    const whatsappBtn = document.getElementById('whatsapp-btn');

    let postUrl = encodeURI(document.location.href);
    let postTitle = encodeURI('{{ $data_pengumuman->judul }}');

    facebookBtn.setAttribute("href", `https://www.facebook.com/sharer.php?u=${postUrl}`);
    twitterBtn.setAttribute("href", `https://twitter.com/share?url=${postUrl}&text=${postTitle}`);
    whatsappBtn.setAttribute("href", `https://wa.me/?text=${postTitle} ${postUrl}`);
</script>
@endsection