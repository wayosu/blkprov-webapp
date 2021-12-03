<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Profile;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_hero = Posts::orderBy('created_at', 'DESC')->take(5)->get();
        $data_heroLeft = $data_hero->splice(0, 1);
        $data_heroRight = $data_hero->splice(0, 4);
        
        $data_terbaru = Posts::orderBy('created_at', 'DESC')->take(2)->get();
        $data_populer = Posts::orderBy('created_at', 'DESC')->take(4)->get();

        $data_pengumuman = Pengumuman::orderBy('created_at', 'DESC')->take(4)->get();
        $data_galeri = Gallery::orderBy('created_at', 'DESC')->take(4)->get();
        $data_profile = Profile::findorfail(1);
        
        return view('home', compact('data_heroLeft', 'data_heroRight', 'data_terbaru', 'data_populer', 'data_pengumuman', 'data_galeri', 'data_profile'));
    }

    public function indexProfil()
    {
        $data_pengumuman = Pengumuman::orderBy('created_at', 'DESC')->take(4)->get();
        $data_profile = Profile::findorfail(1);
        return view('profil', compact('data_pengumuman', 'data_profile'));
    }

    public function indexVisimisi()
    {
        $data_profile = Profile::findorfail(1);
        return view('visimisi', compact('data_profile'));
    }

    public function indexSambutan()
    {
        $data_profile = Profile::findorfail(1);
        return view('sambutan', compact('data_profile'));
    }

    public function indexStruktur()
    {
        $data_profile = Profile::findorfail(1);
        return view('struktur', compact('data_profile'));
    }
}
