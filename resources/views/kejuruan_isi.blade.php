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
                    <a href="/kejuruan">Kejuruan</a>
                    <span>/</span>
                    <a class="current">{{ $title }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-items">
        <div class="container">
            <div class="row flex-column-reverse flex-md-row gap-5 gap-md-0">
                <div class="col-12 col-md-7 col-lg-9">
                    <div class="kurikulum">
                        <div class="row gy-4">
                            @foreach ($data_kejuruan->subkejuruan as $subkejuruan)                                
                                <div class="col-12 col-lg-6">
                                    <div class="card border-0 rounded-0 shadow overflow-hidden">
                                        <div class="card-body p-0">
                                            <div class="bg-name text-center">
                                                <h4 class="mt-0 mb-3">{{ $subkejuruan->nama }}</h4>
                                                <a href="/subkejuruan/{{ $subkejuruan->slug }}" class="btn-download">
                                                    <i class="fas fa-list"></i> Lebih Lengkap
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-3">
                    <div class="card border-0 card-body p-0">
                        <div class="img-link-popup">
                            <a href="{{ asset($data_kejuruan->gambar) }}" target="_blank">
                                <img src="{{ asset($data_kejuruan->gambar) }}" alt="" class="img-kejuruan shadow">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CONTENT -->
@endsection