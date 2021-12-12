<!-- Navbar Tablet & Laptop -->
<nav class="navbar navbar-expand-lg bg-light navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand d-none d-md-block" href="/">
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/front/images/logo-pemprov.png') }}" alt="" width="35">
                <span class="fs-6 fw-bolder ms-2 text-dark">BLK PROVINSI GORONTALO</span>
            </div>
        </a>
        <a class="navbar-brand d-block d-md-none" href="/">
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/front/images/logo-pemprov.png') }}" alt="" width="30">
                <span class="fs-6 fw-bolder ms-2 text-dark">BLK PROV. GORONTALO</span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <small><span class="navbar-toggler-icon"></span></small>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav gap-lg-3 ms-auto my-2 navbar-nav-scroll" style="--bs-scroll-height: 300px;">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ Request::is('profil') || Request::is('visimisi') || Request::is('sambutankepala') || Request::is('strukturorganisasi') ? 'active' : '' }} dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>
                    <ul class="dropdown-menu border-0 my-dropmenu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="/profil">Profil</a></li>
                        <li><a class="dropdown-item" href="/visimisi">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="/sambutankepala">Sambutan Kepala</a></li>
                        <li><a class="dropdown-item" href="/strukturorganisasi">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="/kurikulum">Kurikulum</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('berita') ? 'active' : '' }}" aria-current="page" href="/berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('pengumuman') ? 'active' : '' }}" aria-current="page" href="/pengumuman">Pengumuman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('galeri') ? 'active' : '' }}" aria-current="page" href="/galeri">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kejuruan') ? 'active' : '' }}" aria-current="page" href="/kejuruan">Kejuruan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>