@extends('layouts.front.app', ['title' => 'Kejuruan -'])

@section('content')
<!-- CONTENT -->
<section class="content">
    <div class="bg-header" style="background-image: url({{ asset('assets/front/images/bg5.jpg') }});">
        <div class="container">
            <div class="page-title-content">
                <div class="page-title">
                    <h3 class="m-0">Kejuruan</h3>
                </div>
                <div class="page-breadcrumbs">
                    <a href="/">Home</a>
                    <span>/</span>
                    <a class="current">Kejuruan</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-items">
        <div class="container">
            <div class="kurikulum">
                <div class="d-flex flex-column flex-md-row mb-3 gap-2 justify-content-between align-items-center overflow-hidden">
                    <form action="/kejuruan" class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Search..."
                                name="search" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-search-theme text-white"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="row gy-4">
                    @if ($data_kejuruan->count())
                        @foreach ($data_kejuruan as $kejuruan) 
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card border-0 rounded-0 shadow overflow-hidden">
                                    <div class="card-body p-0">
                                        <div class="bg-name text-center">
                                            <h4 class="mt-0 mb-3">{{ $kejuruan->nama }}</h4>
                                            <a data-bs-toggle="collapse" href="#collapse{{ $kejuruan->id }}" role="button" aria-expanded="false" aria-controls="collapse{{ $kejuruan->id }}" class="btn-download">
                                                <i class="fas fa-list"></i> Lebih Lengkap
                                            </a>
                                        </div>
                                        <div class="collapse mt-0" id="collapse{{ $kejuruan->id }}">
                                            <div class="dropdown-divider"></div>
                                            <div class="p-3">
                                                <ul class="m-0">
                                                    <li><a href="#">Computer Operator Assistant</a></li>
                                                    <li><a href="#">Pembuatan Desain Grafis</a></li>
                                                    <li><a href="#">Desain Grafis Muda</a></li>
                                                    <li><a href="#">Perakiran Komputer</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        @endforeach
                    @else
                        <p class="mt-5 text-center fs-6">Kejuruan tidak ditemukan.</p>
                    @endif
                </div>

                <div class="mt-4">
                    {{ $data_kejuruan->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CONTENT -->
@endsection