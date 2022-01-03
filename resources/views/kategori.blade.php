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
                    <a href="/berita">Berita</a>
                    <span>/</span>
                    <a class="current">{{ $title }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-items">
        <div class="container">
            <div class="kurikulum">
                <div class="row gy-4">
                    @foreach ($data_kategori as $kategori)                        
                        <div class="col-12 col-md-4">
                            <div class="card border-0 rounded-3 shadow overflow-hidden">
                                <div class="card-body p-0">
                                    <div class="bg-name text-center">
                                        <h4 class="mt-0 mb-3">{{ $kategori->name }}</h4>
                                        <a href="/berita?kategori={{ $kategori->slug }}" class="btn-download">
                                            <i class="fas fa-newspaper"></i> Lihat informasi terkait
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CONTENT -->
@endsection