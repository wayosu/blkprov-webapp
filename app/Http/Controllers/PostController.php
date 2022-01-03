<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use App\Models\Tags;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles == 1) {
            $post = Posts::latest()->get();
            $total_berita_pending = Posts::where('status', 0)->count();
            $total_berita_publish = Posts::where('status', 1)->count();
            $total_berita_rejected = Posts::where('status', 2)->count();
            return view('admin.post.index', compact('post', 'total_berita_pending', 'total_berita_publish', 'total_berita_rejected'));
        } else {
            $post = Posts::where('user_id', Auth::user()->id)->latest()->get();
            return view('penulis.post.index', compact('post'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tags::all();

        if (Auth::user()->roles == 1) {
            return view('admin.post.create', compact('category','tags'));
        } else {
            return view('penulis.post.create', compact('category','tags'));
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
            'category_id' => ['required'],
            'konten' => ['required'],
            'gambar' => ['required']
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $post = Posts::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'konten' => $request->konten,
            'gambar' => 'uploads/posts/'.$new_gambar,
            'slug' => Str::slug($request->judul),
            'user_id' => Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        $gambar->move('uploads/posts/', $new_gambar);

        session()->flash('success', 'Post created successfully.');

        if (Auth::user()->roles == 1) {
            return redirect()->route('post.index');
        } else {
            return redirect()->route('penulis.post.index');
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
        $post = Posts::findorfail($id);
        $category = Category::all();
        $tags = Tags::all();

        if (Auth::user()->roles == 1) {
            return view('admin.post.edit', compact('post','category','tags'));
        } else {
            return view('penulis.post.edit', compact('post','category','tags'));
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
            'category_id' => ['required'],
            'konten' => ['required']
        ]);

        $post = Posts::findorfail($id);

        if ($request->has('gambar')) {
            $destination = $request->gambar_lama;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('uploads/posts/', $new_gambar);
            
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'konten' => $request->konten,
                'gambar' => 'uploads/posts/'.$new_gambar,
                'slug' => Str::slug($request->judul)
            ];
        } else {
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'konten' => $request->konten,
                'slug' => Str::slug($request->judul)
            ];
        }

        $post->tags()->sync($request->tags);
        $post->update($post_data);

        session()->flash('success', 'Post updated successfully.');

        if (Auth::user()->roles == 1) {
            return redirect()->route('post.index');
        } else {
            return redirect()->route('penulis.post.index');
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
        $post = Posts::findorfail($id);
        $post->delete();

        session()->flash('success', 'Post deleted successfully. Check recycle bin.');

        if (Auth::user()->roles == 1) {
            return redirect()->route('post.index');
        } else {
            return redirect()->route('penulis.post.index');
        }
    }

    public function recyclebin()
    {
        if (Auth::user()->roles == 1) {
            $post = Posts::onlyTrashed()->latest()->get();
            return view('admin.post.recyclebin', compact('post'));
        } else {
            $post = Posts::onlyTrashed()->where('user_id', Auth::user()->id)->latest()->get();
            return view('penulis.post.recyclebin', compact('post'));
        }
    }

    public function restore($id)
    {
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->restore();

        session()->flash('success', 'Post restored successfully. Check post page.');

        if (Auth::user()->roles == 1) {
            return redirect()->route('post.recyclebin');
        } else {
            return redirect()->route('penulis.post.recyclebin');
        }
    }

    public function deletePermanently(Request $request, $id)
    {
        $post = Posts::withTrashed()->where('id', $id)->first();
        $destination = $request->gambar;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $post->forceDelete();

        session()->flash('success', 'Post has been successfully deleted permanently.');

        if (Auth::user()->roles == 1) {
            return redirect()->route('post.recyclebin');
        } else {
            return redirect()->route('penulis.post.recyclebin');
        }
    }

    public function publishing(Request $request, $id)
    {
        $post = Posts::findorfail($id);

        $publish = 1;
        $rejected = 2;

        if ($request->has('publish')) {
            $post_data = [
                "status" => $publish,
            ];
            $post->update($post_data);
            session()->flash('success', 'Post publish successfully.');
        } else if ($request->has('rejected')) {
            $post_data = [
                "status" => $rejected,
            ];
            $post->update($post_data);
            session()->flash('success', 'Post rejected successfully.');
        }
        
        return redirect()->route('post.index');

    }

}
