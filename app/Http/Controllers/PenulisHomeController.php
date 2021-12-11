<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Pengumuman;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenulisHomeController extends Controller
{
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
        return view('penulis.home', [
            "total_berita" => Posts::where('user_id', Auth::user()->id)->count(),
            "total_pengumuman" => Pengumuman::where('user_id', Auth::user()->id)->count(),
            "total_galeri" => Gallery::where('user_id', Auth::user()->id)->count(),
            "berita_terbaru" => Posts::with(['user', 'category'])->where('user_id', Auth::user()->id)->latest()->take(5)->get(),
            "pengumuman_terbaru" => Pengumuman::with(['user'])->where('user_id', Auth::user()->id)->latest()->take(5)->get(),
            "galeri_tarbaru" => Gallery::with(['user'])->where('user_id', Auth::user()->id)->latest()->take(5)->get(),
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
