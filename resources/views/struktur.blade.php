@extends('layouts.front.app', ['title' => 'Struktur Organisasi -'])

@section('content')
<!-- CONTENT -->
<section class="content">
    <div class="bg-header" style="background-image: url({{ asset('assets/front/images/bg5.jpg') }});">
        <div class="container">
            <div class="page-title-content">
                <div class="page-title">
                    <h3 class="m-0">Struktur Organisasi</h3>
                </div>
                <div class="page-breadcrumbs">
                    <a href="/">Home</a>
                    <span>/</span>
                    <a href="#">Profil</a>
                    <span>/</span>
                    <a class="current">Struktur Organisasi</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-items">
        <div class="container">
            <div class="d-flex gap-3 justify-content-center">
                <img src="{{ asset($data_profile->struktur) }}" alt="struktur-img" class="struktur-img">
            </div>
        </div>
    </div>
</section>
<!-- END CONTENT -->
@endsection