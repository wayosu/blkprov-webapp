<div class="row gy-5">
    <div class="col-12">
        <div class="mb-2">
            <div class="d-flex align-items-center justify-content-between">
                <h6 class="my-0">BERITA POPULER</h6>
                <a href="#" class="my-btn-link small text-muted"><small>All</small></a>
            </div>
            <div class="my-border-bottom-primary"></div>
        </div>
        <div class="row">
            @foreach ($data_populer as $post_populer)
                <div class="col-12 col-md-6 col-xl-12">
                    <a href="#" class="text-decoration-none text-black">
                        <div class="card border-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-3 col-md-4 col-lg-3">
                                    <div class="figure">
                                        <img class="img-fluid rounded-3 my-img-zoom"
                                            src="{{ asset($post_populer->gambar) }}"
                                            alt="Card image cap"
                                            style="height: 10vh;width: 100%;object-fit: cover;">
                                    </div>
                                    {{-- <img src="{{ asset($post_populer->gambar) }}" class="img-fluid rounded-3"
                                    style="height: 100px;width: 100%;object-fit: cover;"> --}}
                                </div>
                                <div class="col-9 col-md-8 col-lg-9">
                                    <div class="card-body">
                                        <h6
                                            class="card-title my-card-title mt-0 mb-1 small">
                                            {{ $post_populer->judul }}</h6>
                                        <div class="small fw-bold my-badge-card-small">
                                            <small>
                                                <span class="badge my-badge">
                                                    {{ $post_populer->category->name }}
                                                </span>
                                                <span
                                                    class="fw-light m-0 mt-0 small text-muted">
                                                    {{ $post_populer->created_at->format('d F Y') }}
                                                </span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-12">
        <div class="mb-2">
            <div class="d-flex align-items-center justify-content-between">
                <h6 class="my-0">PENGUMUMAN</h6>
                <a href="#" class="my-btn-link small text-muted"><small>All</small></a>
            </div>
            <div class="my-border-bottom-primary"></div>
        </div>
        <div class="row">
            @foreach ($data_pengumuman as $pengumuman_terbaru)
                <div class="col-12 col-md-6 col-xl-12">
                    <a href="#" class="text-decoration-none text-black">
                        <div class="card border-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-3 col-lg-2 col-xl-3">
                                    <div class="figure">
                                        <img class="img-fluid rounded-3 my-img-zoom"
                                            src="{{ asset('assets/front/images/announcement.png') }}"
                                            alt="Card image cap"
                                            style="height: 8vh;width: 100%;object-fit: cover;">
                                    </div>
                                    {{-- <img src="{{ asset($post_populer->gambar) }}" class="img-fluid rounded-3"
                                    style="height: 100px;width: 100%;object-fit: cover;"> --}}
                                </div>
                                <div class="col-9 col-lg-10 col-xl-9">
                                    <div class="card-body">
                                        <h6
                                            class="card-title my-card-title mt-0 mb-1 small">
                                            {{ $pengumuman_terbaru->judul }}</h6>
                                        <div class="small fw-bold my-badge-card-small">
                                            <small>
                                                <span
                                                    class="fw-light m-0 mt-0 small text-muted">
                                                    {{ $pengumuman_terbaru->created_at->format('d F Y') }}
                                                </span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between">
            <h6 class="my-0">SOSIAL MEDIA</h6>
        </div>
        <div class="my-border-bottom-primary"></div>
        <div class="d-flex mt-2 justify-content-center">
            <a href="https://twitter.com/{{ $data_profile->twitter }}" target="_BLANK" class="text-decoration-none my-btn-sosmed">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://facebook.com/{{ $data_profile->facebook }}" target="_BLANK" class="text-decoration-none my-btn-sosmed">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://instagram.com/{{ $data_profile->instagram }}" target="_BLANK" class="text-decoration-none my-btn-sosmed">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://youtube.com/channel/{{ $data_profile->youtube }}" target="_BLANK" class="text-decoration-none my-btn-sosmed">
                <i class="fab fa-youtube"></i>
            </a>
        </div>
    </div>
</div>