@extends('layouts.front.app', ['title' => 'Visi & Misi -'])

@section('content')
    @include('layouts.front.announc')

    <section class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xl-8">
                    <div class="mb-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="my-0">Visi & Misi</h3>
                        </div>
                    </div>
                    <p class="small" style="text-align: justify">{{ $data_profile->visimisi }}</p>
                    <div class="mt-5">
                        <div class="dropdown-divider"></div>
                        @include('layouts.front.widget_galeri')
                    </div>
                    <div class="mt-5">
                        <iframe style="height: 40vh;width: 100%;object-fit: cover;" class="rounded-3"
                                    src="https://www.youtube.com/embed/cHwFtCIgZnI" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4">
                    <div class="sidebar-sticky">
                        @include('layouts.front.widget')
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection