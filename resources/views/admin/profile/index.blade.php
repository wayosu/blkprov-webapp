@extends('layouts.admin.app', ['title' => 'Profile'])

@section('content')
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Profile</div>
        </div>
    </div>

    <div class="section-body">
        @include('components.alert')
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-1">
                            <div class="col-md-12 text-center">
                                <img src="{{ asset('assets/front/images/logo-pemprov.png') }}" width="60">
                                <h5 class="my-2">BLK Provinsi Gorontalo</h5>
                                <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-primary mb-2">Edit Profile</a>
                                <div class="border border-bottom"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex mt-2">
                                    <div class="col-md-3">
                                        <p class="font-weight-bold my-1">Alamat</p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="my-1 text-justify">{{ $profile->alamat }}</p>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <p class="font-weight-bold my-1">Telepon</p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="my-1 text-justify">{{ $profile->telepon }}</p>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <p class="font-weight-bold my-1">Twitter</p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="my-1 text-justify"><a href="https://twitter.com/{{ $profile->twitter }}"
                                                target="_BLANK">{{ $profile->twitter }}</a></p>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <p class="font-weight-bold my-1">Facebook</p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="my-1 text-justify"><a href="https://facebook.com/{{ $profile->facebook }}"
                                                target="_BLANK">{{ $profile->facebook }}</a></p>

                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <p class="font-weight-bold my-1">Instagram</p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="my-1 text-justify"><a href="https://instagram.com/{{ $profile->instagram }}"
                                                target="_BLANK">{{ $profile->instagram }}</a></p>

                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <p class="font-weight-bold my-1">Youtube</p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="my-1 text-justify"><a href="https://www.youtube.com/channel/{{ $profile->youtube }}"
                                                target="_BLANK">{{ $profile->youtube }}</a></p>

                                    </div>
                                </div>

                                <iframe
                                    src="{{ $profile->map }}"
                                    width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                    class="mt-2"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <h6 class="font-weight-bold mb-1">Profile</h6>
                            <p class="text-justify">{{ $profile->profile }}</p>
                        </div>
                        <div class="form-group">
                            <h6 class="font-weight-bold mb-1">Visi & Misi</h6>
                            <p class="text-justify">{{ $profile->visimisi }}</p>
                        </div>
                        <div class="form-group">
                            <h6 class="font-weight-bold mb-1">Kata Sambutan</h6>
                            <p class="text-justify">{{ $profile->sambutan }}</p>
                        </div>
                        <div class="form-group overflow-hidden">
                            <h6 class="font-weight-bold mb-1">Struktur Organisasi</h6>
                            <div class="image-link">
                                <a href="{{ asset($profile->struktur) }}" class="btn btn-secondary"
                                    target="_blank">
                                    <i class="fas fa-image"></i>
                                </a>
                            </div>
                        </div>
                        <div class="form-group overflow-hidden mb-0">
                            <h6 class="font-weight-bold mb-1">Kurikulum</h6>
                            <a href="{{ asset($profile->kurikulum) }}" class="btn btn-secondary"
                                target="_blank">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
