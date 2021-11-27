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
    public function index()
    {
        $data_hero = Posts::orderBy('created_at', 'DESC')->take(5)->get();
        $data_heroLeft = $data_hero->splice(0, 1);
        $data_heroRight = $data_hero->splice(0, 4);
        
        $data_terbaru = Posts::orderBy('created_at', 'DESC')->take(2)->get();
        $data_populer = Posts::orderBy('created_at', 'DESC')->take(4)->get();
        
        return view('home', compact('data_heroLeft', 'data_heroRight', 'data_terbaru', 'data_populer'));
    }
}
