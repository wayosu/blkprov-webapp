<!-- NAVBAR -->
<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <div class="d-none d-md-flex align-items-center">
                <img src="{{ asset('assets/front/images/logo-pemprov.png') }}" alt="" width="35">
                <span class="fs-6 ms-2 text-brand">BLK PROVINSI GORONTALO</span>
            </div>
            <div class="d-flex d-md-none align-items-center">
                <img src="{{ asset('assets/front/images/logo-pemprov.png') }}" alt="" width="30">
                <span class="fs-6 ms-2 text-brand">BLK PROV. GORONTALO</span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto small">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu border-0" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="/profil">Tentang BLK Gorontalo</a></li>
                        <li><a class="dropdown-item" href="/visimisi">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="/sambutankepala">Sambutan Kepala</a></li>
                        <li><a class="dropdown-item" href="/strukturorganisasi">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="/kurikulum">Kurikulum</a></li>
                        <li><a class="dropdown-item" href="/daftarinstruktur">Daftar Instruktur</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/pengumuman">Pengumuman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/galeri">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/kejuruan">Kejuruan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAVBAR -->