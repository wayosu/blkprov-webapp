<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Profile;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_pengumuman = Pengumuman::latest()->take(4)->get();
        $data_hero = Posts::orderBy('created_at', 'DESC')->take(5)->get();
        $data_heroLeft = $data_hero->splice(0, 1);
        $data_heroRight = $data_hero->splice(0, 4);
        
        $data_terbaru = Posts::latest()->take(3)->get();
        $data_galeri = Gallery::latest()->take(3)->get();
        $data_profile = Profile::findorfail(1);
        
        return view('home', compact('data_heroLeft', 'data_heroRight', 'data_terbaru', 'data_pengumuman', 'data_galeri', 'data_profile'));
    }

    public function indexProfil()
    {
        $data_pengumuman = Pengumuman::orderBy('created_at', 'DESC')->take(4)->get();
        $data_profile = Profile::findorfail(1);
        $data_populer = Posts::orderBy('created_at', 'DESC')->take(4)->get();
        $data_galeri = Gallery::orderBy('created_at', 'DESC')->take(4)->get();
        
        return view('profil', compact('data_pengumuman', 'data_profile', 'data_populer', 'data_galeri'));
    }

    public function indexVisimisi()
    {
        $data_pengumuman = Pengumuman::orderBy('created_at', 'DESC')->take(4)->get();
        $data_profile = Profile::findorfail(1);
        $data_populer = Posts::orderBy('created_at', 'DESC')->take(4)->get();
        $data_galeri = Gallery::orderBy('created_at', 'DESC')->take(4)->get();
        
        return view('visimisi', compact('data_pengumuman', 'data_profile', 'data_populer', 'data_galeri'));
    }

    public function indexSambutan()
    {
        $data_pengumuman = Pengumuman::orderBy('created_at', 'DESC')->take(4)->get();
        $data_profile = Profile::findorfail(1);
        $data_populer = Posts::orderBy('created_at', 'DESC')->take(4)->get();
        $data_galeri = Gallery::orderBy('created_at', 'DESC')->take(4)->get();

        return view('sambutan', compact('data_pengumuman', 'data_profile', 'data_populer', 'data_galeri'));
    }

    public function indexStruktur()
    {
        $data_pengumuman = Pengumuman::orderBy('created_at', 'DESC')->take(4)->get();
        $data_profile = Profile::findorfail(1);
        $data_populer = Posts::orderBy('created_at', 'DESC')->take(4)->get();
        $data_galeri = Gallery::orderBy('created_at', 'DESC')->take(4)->get();

        return view('struktur', compact('data_pengumuman', 'data_profile', 'data_populer', 'data_galeri'));
    }

    public function indexBerita()
    {
        $data_pengumuman = Pengumuman::orderBy('created_at', 'DESC')->take(4)->get();
        $data_profile = Profile::findorfail(1);
        $data_galeri = Gallery::orderBy('created_at', 'DESC')->take(4)->get();

        return view('berita', [
            "title" => "Berita",
            "data_berita" => Posts::with(['user', 'category'])->latest()->filter(request(['search']))->get(),
            "data_kategori" => Category::latest()->take(4)->get(),
            "data_profile" => $data_profile
        ]);
    }

    public function showBerita(Posts $post)
    {
        return view('berita_isi', [
            "title" => $post->judul,
            "data_berita" => $post,
            "data_profile" => Profile::findorfail(1)
        ]);
    }

    public function indexKategori()
    {
        return view('kategori', [
            "title" => "Kategori",
            "data_kategori" => Category::all(),
            "data_profile" => Profile::findorfail(1)
        ]);
    }

    public function showKategori(Category $category)
    {
        return view('berita', [
            "title" => "Kategori : $category->name",
            "data_berita" => $category->posts->load('user', 'category'),
            "data_profile" => Profile::findorfail(1)
        ]);
    }

    public function indexPengumuman()
    {
        $data_pengumuman = Pengumuman::orderBy('created_at', 'DESC')->paginate(6);
        $data_profile = Profile::findorfail(1);
        $data_berita = Posts::orderBy('created_at', 'DESC')->take(4)->get();
        $data_galeri = Gallery::orderBy('created_at', 'DESC')->take(4)->get();

        return view('pengumuman', compact('data_berita', 'data_profile', 'data_pengumuman', 'data_galeri'));
    }

    public function indexGaleri()
    {
        $data_pengumuman = Pengumuman::orderBy('created_at', 'DESC')->take(4)->get();
        $data_profile = Profile::findorfail(1);
        $data_berita = Posts::orderBy('created_at', 'DESC')->take(4)->get();
        $data_galeri = Gallery::orderBy('created_at', 'DESC')->paginate(6);

        return view('galeri', compact('data_berita', 'data_profile', 'data_pengumuman', 'data_galeri'));
    }
}
