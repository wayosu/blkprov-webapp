@extends('layouts.front.app', ['title' => $title . ' -'])

@section('content')
    {{-- @include('layouts.front.announc') --}}

    <section class="mb-5">
        <div class="container">
               
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3>Kategori Berita : {{ $kategori }}</h3>
                        <a href="/berita">Kembali ke berita</a>
                    </div>
                </div>

                @foreach ($data_berita as $berita)
                    <article>
                        <h2><a href="/berita/{{ $berita->slug }}">{{ $berita->judul }}</a></h2>
                        <p>{{ $berita->isi }}</p>
                    </article>
                @endforeach

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
