@extends('layouts.front.app', ['title' => $title . ' -'])

@section('content')
    {{-- @include('layouts.front.announc') --}}

    <section class="mb-5">
        <div class="container">
               
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3>{{ $data_berita->judul }}</h3>
                        <p>By. {{ $data_berita->user->name }} in <a href="/kategori/{{ $data_berita->category->slug }}">{{ $data_berita->category->name }}</a></p>
                        {!! $data_berita->konten !!}
                        <a href="/berita">Kembali ke berita</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="dropdown-divider"></div>
                        <div class="row g-4 mb-4">
                            <div class="col-12">
                                {{-- @include('layouts.front.widget_galeri') --}}
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
@endsection
