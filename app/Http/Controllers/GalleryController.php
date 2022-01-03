<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles == 1) {
            $gallery = Gallery::latest()->get();
            return view('admin.gallery.index', compact('gallery'));
        } else {
            $gallery = Gallery::where('user_id', Auth::user()->id)->latest()->get();
            return view('penulis.gallery.index', compact('gallery'));
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
            return view('admin.gallery.create');
        } else {
            return view('penulis.gallery.create');
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
            'title' => ['required'],
            'body' => ['required'],
            'cover' => ['required'],
        ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $imageName = time().$file->getClientOriginalName();
            
            $gallery = new Gallery([
                'title' => $request->title,
                'body' => $request->body,
                'cover' => 'uploads/gallery/cover/'.$imageName,
                'slug' => Str::slug($request->title),
                'user_id' => Auth::id(),
            ]);
            $gallery->save();
            
            $file->move('uploads/gallery/cover/', $imageName);
        }

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $imageName = time().$file->getClientOriginalName();
                $request['gallery_id'] = $gallery->id;
                $request['image'] = 'uploads/gallery/images/'.$imageName;
                $file->move('uploads/gallery/images/', $imageName);
                Image::create($request->all());
            }
        }

        session()->flash('success', 'Gallery created successfully.');

        if (Auth::user()->roles == 1) {
            return redirect()->route('gallery.index');
        } else {
            return redirect()->route('penulis.gallery.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::findorfail($id);
        $image = Image::all();

        if (Auth::user()->roles == 1) {
            return view('admin.gallery.edit', compact('gallery', 'image'));
        } else {
            return view('penulis.gallery.edit', compact('gallery', 'image'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'body' => ['required'],
        ]);

        $gallery = Gallery::findorfail($id);

        if ($request->hasFile('cover')) {
            if (File::exists($gallery->cover)) {
                File::delete($gallery->cover);
            }

            $cover = $request->cover;
            $new_cover = time().$cover->getClientOriginalName();
            $cover->move('uploads/gallery/cover/', $new_cover);

            $gallery_data = [
                'title' => $request->title,
                'body' => $request->body,
                'cover' => 'uploads/gallery/cover/'.$new_cover,
                'slug' => Str::slug($request->title),
            ];
        } else {
            $gallery_data = [
                'title' => $request->title,
                'body' => $request->body,
                'slug' => Str::slug($request->title),
            ];
        }

        $gallery->update($gallery_data);

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $imageName = time().$file->getClientOriginalName();
                $request['gallery_id'] = $gallery->id;
                $request['image'] = 'uploads/gallery/images/'.$imageName;
                $file->move('uploads/gallery/images/', $imageName);
                Image::create($request->all());
            }
        }

        session()->flash('success', 'Gallery updated successfully.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $destination = $gallery->cover;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $images = Image::where('gallery_id', $gallery->id)->get();
        foreach($images as $image) {
            if (File::exists($image->image)) {
                File::delete($image->image);
            }
        }

        $gallery->images()->delete();
        $gallery->delete();

        session()->flash('success', 'Gallery deleted successfully.');

        if (Auth::user()->roles == 1) {
            return redirect()->route('gallery.index');
        } else {
            return redirect()->route('penulis.gallery.index');
        }
    }

    public function deleteImage($id)
    {
        $images = Image::findOrFail($id);
        if (File::exists($images->image)) {
            File::delete($images->image);
        }
        Image::find($id)->delete();
        
        return back();
    }
}
