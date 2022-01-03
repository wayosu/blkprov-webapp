<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Pengumuman;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home', [
            "total_user" => User::count(),
            "total_berita" => Posts::count(),
            "total_berita_pending" => Posts::where('status', 0)->count(),
            "total_berita_publish" => Posts::where('status', 1)->count(),
            "total_berita_rejected" => Posts::where('status', 2)->count(),
            "total_pengumuman" => Pengumuman::count(),
            "total_galeri" => Gallery::count(),
            "berita_terbaru" => Posts::with(['user', 'category'])->latest()->take(5)->get(),
            "pengumuman_terbaru" => Pengumuman::with(['user'])->latest()->take(5)->get(),
            "galeri_tarbaru" => Gallery::with(['user'])->latest()->take(5)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
