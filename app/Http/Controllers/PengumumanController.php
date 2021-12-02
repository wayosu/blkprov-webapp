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
        $pengumuman = Pengumuman::paginate(10);
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumuman.create');
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
        ]);

        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'slug' => Str::slug($request->judul),
            'user_id' => Auth::id(),
        ]);

        session()->flash('success', 'Pengumuman created successfully');

        return redirect('admin/pengumuman');
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
        return view('admin.pengumuman.edit', compact('pengumuman'));
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

        $pengumuman = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'slug' => Str::slug($request->judul)
        ];
        
        Pengumuman::whereId($id)->update($pengumuman);

        session()->flash('success', 'Pengumuman successfully updated');

        return redirect('admin/pengumuman');
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

        return redirect('admin/pengumuman');
    }

    public function recyclebin()
    {
        $pengumuman = Pengumuman::onlyTrashed()->paginate(10);
        return view('admin.pengumuman.recyclebin', compact('pengumuman'));
    }

    public function restore($id)
    {
        $pengumuman = Pengumuman::withTrashed()->where('id', $id)->first();
        $pengumuman->restore();

        session()->flash('success', 'Post restored successfully. Check pengumuman page.');

        return redirect('admin/pengumuman/recyclebin');
    }

    public function deletePermanently(Request $request, $id)
    {
        $pengumuman = Pengumuman::withTrashed()->where('id', $id)->first();
        $pengumuman->forceDelete();

        session()->flash('success', 'Pengumuman has been successfully deleted permanently.');

        return redirect('admin/pengumuman/recyclebin');
    }
}
