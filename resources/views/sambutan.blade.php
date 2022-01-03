@extends('layouts.front.app', ['title' => 'Sambutan Kepala -'])

@section('content')
<!-- CONTENT -->
<section class="content">
    <div class="bg-header" style="background-image: url({{ asset('assets/front/images/bg5.jpg') }});">
        <div class="container">
            <div class="page-title-content">
                <div class="page-title">
                    <h3 class="m-0">Sambutan Kepala</h3>
                </div>
                <div class="page-breadcrumbs">
                    <a href="/">Home</a>
                    <span>/</span>
                    <a href="#">Profil</a>
                    <span>/</span>
                    <a class="current">Sambutan Kepala</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-items">
        <div class="container">
            <div class="d-flex gap-3">
                <article>
                    {!! $data_profile->sambutan !!}
                </article>
            </div>
        </div>
    </div>
</section>
<!-- END CONTENT -->
@endsection