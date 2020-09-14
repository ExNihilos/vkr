<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentaryRequest;
use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository;

    public function __construct()
    {
        $this->postRepository = app(PostRepository::class);
    }

    public function create(PostRequest $request)
    {
        return view();
    }

    public function store(PostRequest $request)
    {

    }
}
