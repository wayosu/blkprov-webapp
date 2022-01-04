<?php

namespace App\Http\Controllers;

use App\Models\Kejuruan;
use App\Models\SubKejuruan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SubKejuruanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subkejuruan = SubKejuruan::latest()->get();
        return view('admin.subkejuruan.index', compact('subkejuruan'));
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
            'image' => ['mimes:png,jpg,jpeg|max:2048', 'required'],
            'detail' => ['required'],
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
            'detail' => $request->detail,
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
        $subkejuruan = SubKejuruan::findorfail($id);
        $kejuruan = Kejuruan::all();

        return view('admin.subkejuruan.edit', compact('subkejuruan','kejuruan'));
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
            'kejuruan_id' => ['required'],
            'kurikulum' => ['mimes:pdf,xlsx,xls,xlx|max:2048'],
            'image' => ['mimes:png,jpg,jpeg|max:2048'],
            'detail' => ['required'],
        ]);
        
        $subkejuruan = SubKejuruan::findorfail($id);

        if ($request->has('kurikulum')) {
            $destination_kurikulum = $request->kurikulum_lama;

            if (File::exists($destination_kurikulum)) {
                File::delete($destination_kurikulum);
            }

            $kurikulum = $request->kurikulum;
            $new_kurikulum = time().$kurikulum->getClientOriginalName();
            $kurikulum->move('uploads/subkejuruan/kurikulum/', $new_kurikulum);

            $subkejuruan_data = [
                'nama' => $request->nama,
                'kejuruan_id' => $request->kejuruan_id,
                'slug' => Str::slug($request->nama),
                'kurikulum' => 'uploads/subkejuruan/kurikulum/'.$new_kurikulum,
                'detail' => $request->detail,
            ];
        } else if ($request->has('image')) {
            $destination_image = $request->image_lama;
            
            if (File::exists($destination_image)) {
                File::delete($destination_image);
            }

            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            $image->move('uploads/subkejuruan/image/', $new_image);

            $subkejuruan_data = [
                'nama' => $request->nama,
                'kejuruan_id' => $request->kejuruan_id,
                'slug' => Str::slug($request->nama),
                'image' => 'uploads/subkejuruan/image/'.$new_image,
                'detail' => $request->detail,
            ];
        
        } else if ($request->has('kurikulum') || $request->has('image')) {
            $destination_kurikulum = $request->kurikulum_lama;
            $destination_image = $request->image_lama;

            if (File::exists($destination_kurikulum) || File::exists($destination_image)) {
                File::delete($destination_kurikulum);
                File::delete($destination_image);
            }

            $kurikulum = $request->kurikulum;
            $new_kurikulum = time().$kurikulum->getClientOriginalName();
            $kurikulum->move('uploads/subkejuruan/kurikulum/', $new_kurikulum);

            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            $image->move('uploads/subkejuruan/image/', $new_image);

            $subkejuruan_data = [
                'nama' => $request->nama,
                'kejuruan_id' => $request->kejuruan_id,
                'slug' => Str::slug($request->nama),
                'kurikulum' => 'uploads/subkejuruan/kurikulum/'.$new_kurikulum,
                'image' => 'uploads/subkejuruan/image/'.$new_image,
                'detail' => $request->detail,
            ];
        } else {
            $subkejuruan_data = [
                'nama' => $request->nama,
                'kejuruan_id' => $request->kejuruan_id,
                'slug' => Str::slug($request->nama),
                'detail' => $request->detail,
            ];
        }

        $subkejuruan->update($subkejuruan_data);

        session()->flash('success', 'Sub Kejuruan updated successfully.');
        return redirect()->route('subkejuruan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subkejuruan = SubKejuruan::findOrFail($id);
        $destination_kurikulum = $subkejuruan->kurikulum;
        $destination_image = $subkejuruan->image;
        if (File::exists($destination_kurikulum) || File::exists($destination_image)) {
            File::delete($destination_kurikulum);
            File::delete($destination_image);
        }
        $subkejuruan->delete();

        session()->flash('success', 'Sub Kejuruan deleted successfully.');

        return redirect()->route('subkejuruan.index');
    }
}
