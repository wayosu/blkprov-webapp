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
        $post = Posts::paginate(10);
        return view('admin.post.index', compact('post'));
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
        return view('admin.post.create', compact('category','tags'));
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

        return redirect('admin/post');
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
        return view('admin.post.edit', compact('post','category','tags'));
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

        return redirect('admin/post');
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

        return redirect('admin/post');
    }

    public function recyclebin()
    {
        $post = Posts::onlyTrashed()->paginate(10);
        return view('admin.post.recyclebin', compact('post'));
    }

    public function restore($id)
    {
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->restore();

        session()->flash('success', 'Post restored successfully. Check post page.');

        return redirect('admin/post/recyclebin');
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

        return redirect('admin/post/recyclebin');
    }

}
