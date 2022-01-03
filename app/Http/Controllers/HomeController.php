<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Instruktor;
use App\Models\Kejuruan;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Profile;
use App\Models\SubKejuruan;
use App\Models\User;
use Share;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_pengumuman = Pengumuman::with(['user'])->latest()->take(4)->get();
        
        $data_terbaru = Posts::with(['user', 'category'])->where('status', 1)->latest()->take(3)->get();
        
        $data_kejuruan = Kejuruan::latest()->get();
        
        $data_galeri = Gallery::with(['user'])->orderBy('created_at', 'DESC')->take(5)->get();
        $first_image = $data_galeri->splice(0, 1);
        $second_image = $data_galeri->splice(0, 2);
        $third_image = $data_galeri->splice(0, 1);
        $fourth_image = $data_galeri->splice(0, 1);

        $data_profile = Profile::findorfail(1);
        
        // return $fourth_image;
        return view('home', compact('data_terbaru', 'data_pengumuman', 'data_kejuruan', 'first_image', 'second_image', 'third_image', 'fourth_image', 'data_profile'));
    }

    public function indexProfil()
    {
        $data_pengumuman = Pengumuman::orderBy('created_at', 'DESC')->take(4)->get();
        $data_profile = Profile::findorfail(1);
        $data_berita= Posts::with(['user', 'category'])->latest()->take(4)->get();
        $data_galeri = Gallery::with(['user'])->latest()->take(4)->get();
        
        return view('profil', compact('data_pengumuman', 'data_profile', 'data_berita', 'data_galeri'));
    }

    public function indexVisimisi()
    {
        $data_pengumuman = Pengumuman::orderBy('created_at', 'DESC')->take(4)->get();
        $data_profile = Profile::findorfail(1);
        $data_berita= Posts::with(['user', 'category'])->latest()->take(4)->get();
        $data_galeri = Gallery::with(['user'])->latest()->take(4)->get();
        
        return view('visimisi', compact('data_pengumuman', 'data_profile', 'data_berita', 'data_galeri'));
    }

    public function indexSambutan()
    {
        $data_pengumuman = Pengumuman::orderBy('created_at', 'DESC')->take(4)->get();
        $data_profile = Profile::findorfail(1);
        $data_berita= Posts::with(['user', 'category'])->latest()->take(4)->get();
        $data_galeri = Gallery::with(['user'])->latest()->take(4)->get();

        return view('sambutan', compact('data_pengumuman', 'data_profile', 'data_berita', 'data_galeri'));
    }

    public function indexStruktur()
    {
        $data_pengumuman = Pengumuman::orderBy('created_at', 'DESC')->take(4)->get();
        $data_profile = Profile::findorfail(1);
        $data_berita= Posts::with(['user', 'category'])->latest()->take(4)->get();
        $data_galeri = Gallery::with(['user'])->latest()->take(4)->get();

        return view('struktur', compact('data_pengumuman', 'data_profile', 'data_berita', 'data_galeri'));
    }

    public function indexBerita()
    {
        $data_profile = Profile::findorfail(1); 

        $title = '';
        if (request('kategori')) {
            $category = Category::firstWhere('slug', request('kategori'));
            $title = 'in '. $category->name;
        }
        return view('berita', [
            "title" => "Berita " . $title,
            "data_berita" => Posts::with(['user', 'category'])->where('status', 1)->latest()->filter(request(['search', 'kategori']))->paginate(9)->withQueryString(),
            "data_profile" => $data_profile
        ]);
    }

    public function showBerita(Posts $post)
    {
        return view('berita_isi', [
            "title" => $post->judul,
            "data_berita" => $post,
            "data_galeri" => Gallery::with(['user'])->latest()->take(3)->get(),
            "data_pengumuman" => Pengumuman::latest()->take(3)->get(),
            "data_profile" => Profile::findorfail(1)
        ]);
    }

    public function indexKategori()
    {
        return view('kategori', [
            "title" => "Kategori",
            "data_kategori" => Category::latest()->get(),
            "data_profile" => Profile::findorfail(1)
        ]);
    }

    public function showKategori(Category $category)
    {
        return view('berita', [
            "title" => "Kategori : $category->name",
            "data_berita" => $category->posts->load('user', 'category'),
            "data_kategori" => Category::latest()->take(4)->get(),
            "data_profile" => Profile::findorfail(1)
        ]);
    }

    public function indexPengumuman()
    {
        $data_pengumuman = Pengumuman::with(['user'])->latest()->filter(request(['search']))->paginate(9)->withQueryString();
        $data_profile = Profile::findorfail(1);

        return view('pengumuman', compact('data_pengumuman', 'data_profile'));
    }

    public function showPengumuman(Pengumuman $pengumuman)
    {
        return view('pengumuman_isi', [
            "title" => $pengumuman->judul,
            "data_pengumuman" => $pengumuman,
            "data_berita" => Posts::where('status', 1)->latest()->take(3)->get(),
            "data_galeri" => Gallery::latest()->take(3)->get(),
            "data_profile" => Profile::findorfail(1)
        ]);
    }

    public function indexGaleri()
    {
        $data_profile = Profile::findorfail(1);
        $data_galeri = Gallery::with(['user'])->latest()->filter(request(['search']))->paginate(9)->withQueryString();

        return view('galeri', compact('data_profile', 'data_galeri'));
    }

    public function showGaleri(Gallery $gallery)
    {
        return view('galeri_isi', [
            "title" => $gallery->title,
            "data_galeri" => $gallery,
            "data_pengumuman" => Pengumuman::latest()->take(3)->get(),
            "data_berita" => Posts::where('status', 1)->latest()->take(3)->get(),
            "data_profile" => Profile::findorfail(1)
        ]);
    }

    public function indexKejuruan()
    {
        return view('kejuruan', [
            "title" => 'Kejuruan',
            "data_kejuruan" => Kejuruan::latest()->filter(request(['search']))->paginate(9)->withQueryString(),
            "data_profile" => Profile::findorfail(1)
        ]);
    }

    public function showKejuruan(Kejuruan $kejuruan)
    {
        return view('kejuruan_isi', [
            "title" => $kejuruan->nama,
            "data_kejuruan" => $kejuruan,
            "data_profile" => Profile::findorfail(1)
        ]);
    }

    public function showSubKejuruan(SubKejuruan $subKejuruan)
    {
        return view('subkejuruan', [
            "title" => $subKejuruan->nama,
            "data_subkejuruan" => $subKejuruan,
            "data_profile" => Profile::findorfail(1)
        ]);
    }

    public function indexKurikulum()
    {
        return view('kurikulum', [
            "title" => 'Kurikulum',
            "data_kejuruan" => Kejuruan::latest()->get(),
            "data_profile" => Profile::findorfail(1)
        ]);
    }

    public function downloadKurikulum()
    {
        $profile = Profile::findorfail(1);
        $file = public_path($profile->kurikulum);

        return response()->download($file);
    }

    public function indexInstruktur()
    {
        return view('daftar_instruktur', [
            "title" => 'Daftar Instruktur',
            "data_instruktur" => Instruktor::get(),
            "data_profile" => Profile::findorfail(1)
        ]);
    }
}
