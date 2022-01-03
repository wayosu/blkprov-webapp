@extends('layouts.front.app', ['title' => 'Tentang BLK Gorontalo -'])

@section('content')
<!-- CONTENT -->
<section class="content">
    <div class="bg-header" style="background-image: url({{ asset('assets/front/images/bg5.jpg') }});">
        <div class="container">
            <div class="page-title-content">
                <div class="page-title">
                    <h3 class="m-0">Tentang BLK Gorontalo</h3>
                </div>
                <div class="page-breadcrumbs">
                    <a href="/">Home</a>
                    <span>/</span>
                    <a href="#">Profil</a>
                    <span>/</span>
                    <a class="current">Tentang BLK Gorontalo</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-items">
        <div class="container">
            <div class="d-flex flex-column gap-3">
                <img src="{{ asset('assets/front/images/profil.jpg') }}" alt="profil-img" class="profil-img">
                {!! $data_profile->profile !!}
            </div>
        </div>
    </div>
</section>
<!-- END CONTENT -->
@endsection