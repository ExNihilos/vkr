<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentaryRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repositories\PostRepository;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $postRepository;
    private $postService;

    public function __construct()
    {
        $this->postRepository = app(PostRepository::class);
        $this->postService = app(PostService::class);
    }


    public function create(Request $request)
    {
        return view('layouts.app');
    }


    public function index(Request $request)
    {
        $posts = $this->postRepository->getPosts();
        return view('index', ['posts' => $posts]);
    }


    public function store(PostRequest $request)
    {
        //$request = $request->validated();
        $post = $request->validated();
        $post['user_id'] = Auth::user()->getAuthIdentifier();
        $post = $this->postRepository->store($post);
        echo $post; dd($post);
        $posts= $this->postRepository->getPosts();
        return view('home', ['posts'=>$posts] );
    }

//    public function getPosts()
//    {
//        $posts = Post::orderBy('created_at', 'desc')
//            ->take(10)
//            ->get();
//
//        return $posts;
//    }

    public function sort() {
        $posts=$this->postRepository->sortByRating();
        return view('home', $posts);
    }

}
