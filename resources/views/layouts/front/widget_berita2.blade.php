<div class="row gy-4 justify-content-center">
    @foreach ($data_berita as $berita)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                <div class="figure rounded-0">
                    <img class="card-img-top my-img-zoom" src="{{ asset($berita->gambar) }}" alt="Card image cap"
                        style="height: 25vh;object-fit: cover;">
                </div>
                <a href="/berita?kategori={{ $berita->category->name }}" class="position-absolute px-3 my-badge py-1 small">
                    <span class="badge rounded-0">{{ $berita->category->name }}</span>
                </a>
                <div class="card-body py-3">
                    <a href="/berita/{{ $berita->slug }}"
                        class="card-title h5 my-card-title fw-normal text-decoration-none my-text-black">
                        {{ $berita->judul }}
                    </a>
                    <p class="fw-bold small mt-0 mb-2">
                        <small>
                            @if ($berita->user_id == 1)
                                <small>Admin</small>
                            @else
                                <small>{{ $berita->user->name }}</small>
                            @endif
                            <small>
                                <span class="fw-light text-muted">-
                                    {{ $berita->created_at->diffForHumans() }}
                                </span>
                            </small>
                        </small>
                    </p>
                    <p class="m-0 text-secondary small">
                        {{ \Illuminate\Support\Str::limit(strip_tags($berita->konten), 150, '...') }}
                    </p>
                </div>
            </div>

        </div>
    @endforeach
</div>
