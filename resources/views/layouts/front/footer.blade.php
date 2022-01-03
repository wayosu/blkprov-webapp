<!-- FOOTER -->
<section class="footer py-2 text-center">
    <div class="my-5">            
        <div class="container">
            <h3 class="mb-4">Video & Maps</h3>
            <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-5 mb-5 overflow-hidden">
                <iframe src="https://www.youtube.com/embed/oKlWDM5hVPE" frameborder="0" width="500" height="300"></iframe>
                <iframe src="{{ $data_profile->map }}" width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <hr class="hr">

            <div class="d-flex flex-column flex-md-row gap-4 gap-md-0 align-items-center justify-content-center mt-5">
                <img src="{{ asset('assets/front/images/logo-pemprov.png') }}" alt="logo" width="80">
                <h3 class="ms-0 ms-md-3 fw-bold text-uppercase text-white">Balai Latihan Kerja<br>Provinsi Gorontalo</h3>
            </div>

            <p class="text-white my-4">{{ $data_profile->alamat }}</p>
            <p class="text-secondary">HUBUNGI KAMI</p>
            <h5 class="text-white mt-0">Tlp. {{ $data_profile->telepon }}</h5>

            <div class="d-flex mt-4 justify-content-center align-items-center">
                <a href="https://twitter.com/{{ $data_profile->twitter }}" target="_BLANK" class="text-decoration-none btn-sosmed">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://facebook.com/{{ $data_profile->facebook }}" target="_BLANK" class="text-decoration-none btn-sosmed">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://instagram.com/{{ $data_profile->instagram }}" target="_BLANK" class="text-decoration-none btn-sosmed">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://youtube.com/channel/{{ $data_profile->youtube }}" target="_BLANK" class="text-decoration-none btn-sosmed">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- END FOOTER -->

<!-- COPYRIGHT -->
<section class="copyright py-3 text-center">
    <div class="container">
        <p class="m-0">© UPTD BLK LATRANS PROVINSI GORONTALO {{ \Carbon\Carbon::now()->isoFormat('Y') }} - Developed by Hectast.</p>
    </div>
</section>
<!-- END COPYRIGHT -->