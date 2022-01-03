@extends('layouts.front.app', ['title' => 'Visi & Misi -'])

@section('content')
<!-- CONTENT -->
<section class="content">
    <div class="bg-header" style="background-image: url({{ asset('assets/front/images/bg5.jpg') }});">
        <div class="container">
            <div class="page-title-content">
                <div class="page-title">
                    <h3 class="m-0">Visi & Misi</h3>
                </div>
                <div class="page-breadcrumbs">
                    <a href="/">Home</a>
                    <span>/</span>
                    <a href="#">Profil</a>
                    <span>/</span>
                    <a class="current">Visi & Misi</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-items">
        <div class="container">
            <div class="d-flex gap-3">
                <article>
                    {!! $data_profile->visimisi !!}
                </article>
            </div>
        </div>
    </div>
</section>
<!-- END CONTENT -->
@endsection