@extends('layouts.front.app', ['title' => $title . ' -'])

@section('content')
<!-- CONTENT -->
<section class="content">
    <div class="bg-header" style="background-image: url({{ asset('assets/front/images/bg5.jpg') }});">
        <div class="container">
            <div class="page-title-content">
                <div class="page-title">
                    <h3 class="m-0">Kurikulum</h3>
                </div>
                <div class="page-breadcrumbs">
                    <a href="/">Home</a>
                    <span>/</span>
                    <a href="#">Profil</a>
                    <span>/</span>
                    <a class="current">Kurikulum</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-items">
        <div class="container">
            <div class="kurikulum">
                <div class="row gy-4">
                    @foreach ($data_kejuruan as $kejuruan)                        
                        <div class="col-12 col-md-4">
                            <div class="card border-0 rounded-3 shadow overflow-hidden">
                                <div class="card-body p-0">
                                    <div class="bg-name text-center">
                                        <h4 class="mt-0 mb-3">{{ $kejuruan->nama }}</h4>
                                        <a data-bs-toggle="collapse" href="#collapse{{ $kejuruan->id }}" role="button" aria-expanded="false" aria-controls="collapse{{ $kejuruan->id }}" class="btn-download">
                                            <i class="fas fa-download"></i> Download
                                        </a>
                                    </div>
                                    <div class="collapse mt-0" id="collapse{{ $kejuruan->id }}">
                                        <div class="dropdown-divider"></div>
                                        <div class="p-3">
                                            <ul class="m-0">
                                                @foreach ($kejuruan->subkejuruan as $sub)
                                                    <li><a href="{{ asset($sub->kurikulum) }}">{{ $sub->nama }}</a></li>
                                                @endforeach
                                            </ul>
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
</section>
<!-- END CONTENT -->
@endsection