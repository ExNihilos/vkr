<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentaryRequest;
use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $postRepository;

    public function __construct()
    {
        $this->postRepository = app(PostRepository::class);
    }

    public function create(Request $request)
    {
        return view('createPost');
    }

    public function store(PostRequest $request)
    {
        //$request = $request->validated();
        $attributes = $request->validated();
        $attributes['user_id'] = Auth::user()->getAuthIdentifier();
        $post = $this->postRepository->store($attributes);
    }
}
