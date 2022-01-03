<?php

namespace App\Http\Controllers;

use App\Models\Kejuruan;
use App\Models\SubKejuruan;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KejuruanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kejuruan = Kejuruan::latest()->get();
        return view('admin.kejuruan.index', compact('kejuruan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kejuruan.create');
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
            'nama' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['required']
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        Kejuruan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => 'uploads/other/'.$new_gambar,
            'slug' => Str::slug($request->nama),
        ]);

        $gambar->move('uploads/other/', $new_gambar);

        session()->flash('success', 'Kejuruan created successfully.');

        return redirect()->route('kejuruan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kejuruan  $kejuruan
     * @return \Illuminate\Http\Response
     */
    public function show(Kejuruan $kejuruan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kejuruan  $kejuruan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kejuruan = Kejuruan::findorfail($id);
        return view('admin.kejuruan.edit', compact('kejuruan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kejuruan  $kejuruan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required'],
            'deskripsi' => ['required'],
        ]);

        $kejuruan = Kejuruan::findorfail($id);

        if ($request->has('gambar')) {
            $destination = $request->gambar_lama;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('uploads/other/', $new_gambar);
            
            $kejuruan_data = [
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'gambar' => 'uploads/other/'.$new_gambar,
                'slug' => Str::slug($request->nama),
            ];
        } else {
            $kejuruan_data = [
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->nama),
            ];
        }

        $kejuruan->update($kejuruan_data);

        session()->flash('success', 'Kejuruan updated successfully.');

        return redirect()->route('kejuruan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kejuruan  $kejuruan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kejuruan = Kejuruan::findOrFail($id);
        $destination = $kejuruan->gambar;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $kurikulums = SubKejuruan::where('kejuruan_id', $kejuruan->id)->get();
        foreach($kurikulums as $kurikulum) {
            if (File::exists($kurikulum->kurikulum)) {
                File::delete($kurikulum->kurikulum);
            }
        }

        $images = SubKejuruan::where('kejuruan_id', $kejuruan->id)->get();
        foreach($images as $image) {
            if (File::exists($image->image)) {
                File::delete($image->image);
            }
        }

        $kejuruan->subkejuruan()->delete();
        $kejuruan->delete();

        session()->flash('success', 'Kejuruan deleted successfully.');

        return redirect()->route('kejuruan.index');
    }
}
