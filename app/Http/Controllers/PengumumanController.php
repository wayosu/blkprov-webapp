<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles == 1) {
            $pengumuman = Pengumuman::latest()->get();
            return view('admin.pengumuman.index', compact('pengumuman'));
        } else {
            $pengumuman = Pengumuman::where('user_id', Auth::user()->id)->latest()->get();
            return view('penulis.pengumuman.index', compact('pengumuman'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->roles == 1) {
            return view('admin.pengumuman.create');
        } else {
            return view('penulis.pengumuman.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required'],
            'isi' => ['required'],
            'gambar' => ['required']
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $pengumuman = Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => 'uploads/pengumuman/'.$new_gambar,
            'slug' => Str::slug($request->judul),
            'user_id' => Auth::id(),
        ]);

        $gambar->move('uploads/pengumuman/', $new_gambar);

        session()->flash('success', 'Pengumuman created successfully');

        if (Auth::user()->roles == 1) {
            return redirect()->route('pengumuman.index');
        } else {
            return redirect()->route('penulis.pengumuman.index');
        }
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
        $pengumuman = Pengumuman::findorfail($id);

        if (Auth::user()->roles == 1) {
            return view('admin.pengumuman.edit', compact('pengumuman'));
        } else {
            return view('penulis.pengumuman.edit', compact('pengumuman'));
        }
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
        $request->validate([
            'judul' => ['required'],
            'isi' => ['required'],
        ]);

        $pengumuman = Pengumuman::findorfail($id);
        
        if ($request->has('gambar')) {
            $destination = $request->gambar_lama;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('uploads/pengumuman/', $new_gambar);
            
            $pengumuman_data = [
                'judul' => $request->judul,
                'isi' => $request->isi,
                'gambar' => 'uploads/pengumuman/'.$new_gambar,
                'slug' => Str::slug($request->judul)
            ];
        } else {
            $pengumuman_data = [
                'judul' => $request->judul,
                'isi' => $request->isi,
                'slug' => Str::slug($request->judul)
            ];
        }
        
        $pengumuman->update($pengumuman_data);
        
        session()->flash('success', 'Pengumuman successfully updated');

        if (Auth::user()->roles == 1) {
            return redirect()->route('pengumuman.index');
        } else {
            return redirect()->route('penulis.pengumuman.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findorfail($id);
        $pengumuman->delete();

        session()->flash('success', 'Pengumuman deleted successfully. Check recycle bin.');

        if (Auth::user()->roles == 1) {
            return redirect()->route('pengumuman.index');
        } else {
            return redirect()->route('penulis.pengumuman.index');
        }
    }

    public function recyclebin()
    {
        if (Auth::user()->roles == 1) {
            $pengumuman = Pengumuman::onlyTrashed()->latest()->get();
            return view('admin.pengumuman.recyclebin', compact('pengumuman'));
        } else {
            $pengumuman = Pengumuman::onlyTrashed()->where('user_id', Auth::user()->id)->latest()->get();
            return view('penulis.pengumuman.recyclebin', compact('pengumuman'));
        }
    }

    public function restore($id)
    {
        $pengumuman = Pengumuman::withTrashed()->where('id', $id)->first();
        $pengumuman->restore();

        session()->flash('success', 'Post restored successfully. Check pengumuman page.');

        if (Auth::user()->roles == 1) {
            return redirect()->route('pengumuman.recyclebin');
        } else {
            return redirect()->route('penulis.pengumuman.recyclebin');
        }
    }

    public function deletePermanently(Request $request, $id)
    {
        $pengumuman = Pengumuman::withTrashed()->where('id', $id)->first();
        $pengumuman->forceDelete();

        session()->flash('success', 'Pengumuman has been successfully deleted permanently.');

        if (Auth::user()->roles == 1) {
            return redirect()->route('pengumuman.recyclebin');
        } else {
            return redirect()->route('penulis.pengumuman.recyclebin');
        }
    }
}
