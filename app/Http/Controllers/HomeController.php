<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Repositories\PostRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $postRepository;


    public function __construct()
    {
        $this->middleware('auth');
        $this->postRepository = app(PostRepository::class);
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

    /**
     * @return Application|Factory|View
     */
    public function showPosts()
    {
        $posts = $this->postRepository->getPosts();
        $tags = Tag::all();

        return view('home', ['posts' => $posts,'tags' => $tags]);
    }

}
