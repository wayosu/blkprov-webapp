<div id="myCarousel2" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($data_galeri as $galeri_terbaru)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ asset($galeri_terbaru->cover) }}" alt="foto" class="rounded-3"
                    style="height: 300px;width: 100%;object-fit: cover;">

                <div class="container">
                    <div class="carousel-caption text-start">
                        <div class="my-0">
                            <small>
                                <span class="badge my-badge">FOTO</span>
                            </small>
                        </div>
                        <a href="/galeri/{{ $galeri_terbaru->slug }}" class="text-decoration-none text-white my-link-carousel">
                            <h4 class="my-2 fw-normal ">
                                {{ $galeri_terbaru->title }}
                            </h4>
                        </a>
                        <p class="my-0 fw-bold small">
                            <small>
                                @if ($galeri_terbaru->user_id == 1)
                                    <small>Admin</small>
                                @else
                                    <small>{{ $galeri_terbaru->user->name }}</small>
                                @endif
                                <small>
                                    <span class="fw-light">
                                        -
                                        {{ $galeri_terbaru->created_at->diffForHumans() }}
                                    </span>
                                </small>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel2" data-bs-slide="prev">
        <h2 class="m-0 p-0"><span class="fas fa-angle-left" aria-hidden="true"></span></h2>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel2" data-bs-slide="next">
        <h2 class="m-0 p-0"><span class="fas fa-angle-right" aria-hidden="true"></span></h2>
    </button>
</div>
