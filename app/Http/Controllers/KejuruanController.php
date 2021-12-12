<?php

namespace App\Http\Controllers;

use App\Models\Kejuruan;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

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
            ];
        } else {
            $kejuruan_data = [
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
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
        $gallery = Kejuruan::findOrFail($id);
        $destination = $gallery->gambar;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $gallery->delete();

        session()->flash('success', 'Kejuruan deleted successfully.');

        return redirect()->route('kejuruan.index');
    }
}
