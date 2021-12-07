<div id="myCarousel2" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($data_galeri as $geleri_terbaru)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ asset($geleri_terbaru->cover) }}" alt="foto" class="rounded-3"
                    style="height: 40vh;width: 100%;object-fit: cover;">

                <div class="container">
                    <div class="carousel-caption text-start">
                        <div class="my-0">
                            <small>
                                <span class="badge my-badge">FOTO</span>
                            </small>
                        </div>
                        <h4 class="my-2 fw-normal">
                            {{ $geleri_terbaru->title }}
                        </h4>
                        <p class="my-0 fw-bold small">
                            <small>
                                @if ($geleri_terbaru->user_id == 1)
                                    <small>Admin</small>
                                @else
                                    <small>{{ $geleri_terbaru->user->name }}</small>
                                @endif
                                <small>
                                    <span class="fw-light">
                                        -
                                        {{ $geleri_terbaru->created_at->diffForHumans() }}
                                    </span>
                                </small>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel2"
        data-bs-slide="prev">
        <h2 class="m-0 p-0"><span class="fas fa-angle-left" aria-hidden="true"></span></h2>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel2"
        data-bs-slide="next">
        <h2 class="m-0 p-0"><span class="fas fa-angle-right" aria-hidden="true"></span></h2>
    </button>
</div>