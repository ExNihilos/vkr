<?php

namespace App\Http\Controllers;

use App\Models\Commentary;
use App\Models\Post;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showPosts()
    {
        $posts = $this -> getPosts();
        return view('home', ['posts'=>$posts]);

        /*$paste = new Paste();
        dd($paste->all());*/
    }

    public function getPosts()
    {
        $posts = Post::orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return $posts;
    }

}
