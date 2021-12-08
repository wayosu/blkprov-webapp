@extends('layouts.front.app', ['title' => $title . ' -'])

@section('content')
    {{-- @include('layouts.front.announc') --}}

    <section class="mb-5">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-md-12">
                    <h1>{{ $data_berita->judul }}</h1>
                    
                    <p class="text-uppercase small">By. {{ $data_berita->user->name }} in 
                        <a href="/kategori/{{ $data_berita->category->slug }}" class="text-decoration-none my-text-link-danger">{{ $data_berita->category->name }}</a>
                        <span class="text-muted">{{ $data_berita->created_at->diffForHumans() }}</span>
                    </p>

                    <img src="{{ asset($data_berita->gambar) }}" alt="gambar" class="img-fluid rounded-3" style="width: 100%; height: 50%; object-fit: cover; object-position: center">
                    
                    <article class="my-3">
                        {!! $data_berita->konten !!}
                    </article>

                    <a href="/berita" class="my-btn-backto-danger px-3 py-2 small rounded-3"><i class="fas fa-arrow-left"></i> Kembali ke berita</a>
                </div>
            </div>
        </div>
    </section>
@endsection
