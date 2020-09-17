<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentaryRequest;
use App\Http\Requests\PostRequest;
use App\Models\Commentary;
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


    public function index()
    {
        $posts = $this->postRepository->getPosts();
        return redirect()->route('home')->with('success', ['posts' => $posts]);
    }


    public function store(PostRequest $post)
    {
        $request = $request->validated();
        //$post = $request->validated();
        $post['user_id'] = Auth::user()->getAuthIdentifier();
        $post = $this->postRepository->store($post);
//        echo $post; dd($post);
        $posts= $this->postRepository->getPosts();
        return redirect()
            ->route('home')
            ->with('success',  ['posts' => $posts]);
//        return view('home', ['posts' => $posts] );// Не перенаправляет на страницу
    }

//    public function getPosts()
//    {
//        $posts = Post::orderBy('created_at', 'desc')
//            ->take(10)
//            ->get();
//
//        return $posts;
//    }

    public function sort($type) {

        if ($type==='rating') {
            $posts=$this->postRepository->sortByRating();
            return view('home', ['posts' => $posts]);
        }


           return $this->index();

    }

    public function showPost($id) {
        $post = Post::where('id', $id)->first();
        //$commentaries = Commentary::where('post_id', $id)->get();
        return view('post', ['post' => $post]); // ?
    }

    public function rate($id) {
        $post = Post::where('id', $id)->first();
        $post->rating+=1;
        $post->save();
        //return view('post', ['post'=>$post]);
        return redirect()
            ->route('post.show',$post->id)
            ->with('success', ['post'=>$post]);
    }
}
