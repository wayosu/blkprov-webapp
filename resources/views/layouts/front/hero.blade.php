<section id="hero" class="mb-5">
    <div class="container">
        <div class="row align-items-stretch g-1">
            @foreach ($data_heroLeft as $post_heroLeft)
                <div class="col-12 col-lg-6">
                    <a href="#" class="text-decoration-none text-black">
                        <div class="card border-0" style="max-height: 22.79em;">
                            <div class="figure">
                                <img class="card-img-top rounded-3 my-img-zoom"
                                    src="{{ asset($post_heroLeft->gambar) }}" alt="Card image cap"
                                    height="400" style="object-fit: cover;">
                            </div>
                            <div class="card-body my-content-card pb-0 px-0">
                                <small>
                                    <span class="badge my-badge">{{ $post_heroLeft->category->name }}</span>
                                </small>
                                <h4 class="card-title mt-2">
                                    {{ $post_heroLeft->judul }}
                                </h4>
                                <p class="mb-0 fw-bold small">
                                    <small>
                                        @if ($post_heroLeft->user_id == 1)
                                            Admin
                                        @else
                                            {{ $post_heroLeft->user->name }}
                                        @endif
                                        <span class="fw-light">
                                            - {{ $post_heroLeft->created_at->format('d F Y') }}
                                        </span>
                                    </small>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-12 col-lg-6">
                <div class="row my-card-scroll g-1">
                    @foreach ($data_heroRight as $post_heroRight)
                        <div class="col-10 col-md-6">
                            <a href="#" class="text-decoration-none text-black">
                                <div class="card border-0" style="max-height: 180px;">
                                    <div class="figure">
                                        <img class="card-img-top rounded-3 my-img-zoom"
                                            src="{{ asset($post_heroRight->gambar) }}" alt="Card image cap"
                                            height="200" style="object-fit: cover;">
                                    </div>
                                    <div class="card-body my-content-card pb-0 px-0">
                                        <small>
                                            <span
                                                class="badge my-badge">{{ $post_heroRight->category->name }}</span>
                                        </small>
                                        <h6 class="card-title mt-2">
                                            {{ $post_heroRight->judul }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>