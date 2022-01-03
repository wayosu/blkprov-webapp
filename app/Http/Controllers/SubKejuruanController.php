<?php

namespace App\Http\Controllers;

use App\Models\Kejuruan;
use App\Models\SubKejuruan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SubKejuruanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subkejuruan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kejuruan = Kejuruan::all();
        return view('admin.subkejuruan.create', compact('kejuruan'));
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
            'kejuruan_id' => ['required'],
            'kurikulum' => ['mimes:pdf,xlsx,xls,xlx|max:2048', 'required'],
            'image' => ['mimes:png,jpg,jpeg|max:2048', 'required']
        ]);

        $kurikulum = $request->kurikulum;
        $new_kurikulum = time().$kurikulum->getClientOriginalName();

        $image = $request->image;
        $new_image = time().$image->getClientOriginalName();

        SubKejuruan::create([
            'nama' => $request->nama,
            'kejuruan_id' => $request->kejuruan_id,
            'kurikulum' => 'uploads/subkejuruan/kurikulum/'.$new_kurikulum,
            'image' => 'uploads/subkejuruan/image/'.$new_image,
            'slug' => Str::slug($request->nama),
        ]);

        $kurikulum->move('uploads/subkejuruan/kurikulum/', $new_kurikulum);
        $image->move('uploads/subkejuruan/image/', $new_image);

        session()->flash('success', 'Sub Kejuruan created successfully.');

        return redirect()->route('subkejuruan.index');
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
