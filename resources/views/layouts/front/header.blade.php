<!-- HEADER -->
<div class="py-1 bg-gradient-theme">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-1 small">
            <p class="m-0 text-white">
                {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
            </p>
            <p class="d-none d-md-block m-0 small text-white text-uppercase fw-bold">UPTD BLK LATRANS Provinsi Gorontalo</p>
            @if (Route::has('login'))
                @auth
                    <a href="{{ (Auth::user()->roles == 1) ? route('admin.home') : route('penulis.home') }}" class="btn btn-sm btn-login-theme px-4 py-1 small shadow-sm rounded-3">{{ \Illuminate\Support\Str::limit(strip_tags(Auth::user()->name), 10, '..') }}</a>
                @else
                    <a href="/login" class="btn btn-sm btn-login-theme px-4 py-1 small shadow-sm rounded-3">Login</a>
                @endauth
            @endif
        </div>
    </div>
</div>
<!-- END HEADER -->