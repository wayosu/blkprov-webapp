<section id="pengumuman" class="mb-3">
    <div class="container">
        <div class="d-flex flex-wrap flex-md-nowrap justify-content-center">
            <div class="bg-danger mb-2 h-100">
                <h6 class="m-0 px-2 py-1 text-white small">PENGUMUMAN</h6>
            </div>
            <div id="mySlidePengumuman" class="carousel slide carousel-fade w-100" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($data_pengumuman as $pengumuman_terbaru)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="4000">
                            <div class="container">
                                <div class="carousel-caption text-start">
                                    <h1 class="m-0">{{ $pengumuman_terbaru->judul }}</h1>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="my-btn-nxpv">
                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#mySlidePengumuman" data-bs-slide="prev">
                        <h2 class="m-0 p-0"><span class="fas fa-angle-left"
                                aria-hidden="true"></span></h2>
                    </button>
                    <button class="carousel-control-next" type="button"
                        data-bs-target="#mySlidePengumuman" data-bs-slide="next">
                        <h2 class="m-0 p-0"><span class="fas fa-angle-right"
                                aria-hidden="true"></span></h2>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>