<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Posts;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Posts $posts)
    {
        $data = $posts->orderBy('created_at', 'desc')->limit(2)->get();
        return view('home', compact('data'));
    }
}
