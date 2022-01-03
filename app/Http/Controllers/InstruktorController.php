<?php

namespace App\Http\Controllers;

use App\Models\Instruktor;
use App\Models\Kejuruan;
use Illuminate\Http\Request;

class InstruktorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instruktor = Instruktor::latest()->get();
        return view('admin.instruktor.index', compact('instruktor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kejuruan = Kejuruan::all();
        return view('admin.instruktor.create', compact('kejuruan'));
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
            'nip' => ['required'],
            'kejuruan_id' => ['required'],
        ]);

        Instruktor::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'kejuruan_id' => $request->kejuruan_id,
            'tahun_diklat' => $request->tahun_diklat,
            'penempatan' => $request->penempatan,
            'keterangan' => $request->keterangan,
        ]);

        session()->flash('success', 'Instruktor created successfully.');

        return redirect()->route('instruktor.index');
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
        $instruktor = Instruktor::findorfail($id);
        $kejuruan = Kejuruan::all();

        return view('admin.instruktor.edit', compact('instruktor','kejuruan'));
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
            'nama' => ['required'],
            'nip' => ['required'],
            'kejuruan_id' => ['required'],
        ]);
        
        $instruktor = Instruktor::findorfail($id);

        $instruktor_data = [
            'nama' => $request->nama,
            'nip' => $request->nip,
            'kejuruan_id' => $request->kejuruan_id,
            'tahun_diklat' => $request->tahun_diklat,
            'penempatan' => $request->penempatan,
            'keterangan' => $request->keterangan,
        ];

        $instruktor->update($instruktor_data);

        session()->flash('success', 'Instruktor updated successfully.');
        return redirect()->route('instruktor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instruktor = Instruktor::findOrFail($id);
        $instruktor->delete();

        session()->flash('success', 'Instruktor deleted successfully.');

        return redirect()->route('instruktor.index');
    }
}
