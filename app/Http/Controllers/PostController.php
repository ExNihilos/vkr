<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repositories\PostRepository;
use App\Services\PostService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Ramsey\Uuid\Generator\RandomGeneratorFactory;
use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
    private $postRepository;
    private $postService;


    public function __construct()
    {
        $this->postRepository = app(PostRepository::class);
        $this->postService = app(PostService::class);
    }


    /**
     * @return RedirectResponse
     */
    public function index()
    {
        $posts = $this->postRepository->getPosts();
        return redirect()->route('home')->with('success', ['posts' => $posts]);
    }

    /**
     * @param PostRequest $post
     * @return RedirectResponse
     */
    public function store(PostRequest $post)
    {
        $posts = $this ->postService->store($post);

        return redirect()
            ->route('home')
            ->with('success', ['posts' => $posts]);
    }

    /**
     * @param $type
     * @return Application|Factory|RedirectResponse|View
     */
    public function sort($type)
    {
        if ($type === 'rating') {
            $posts = $this->postRepository->sortByRating();
            return view('home', ['posts' => $posts]);
        }

        return $this->index();
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function showPost($id)
    {
        $post = Post::where('id', $id)->first();
        return view('post', ['post' => $post]); // ?
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function rate($id)
    {
        $post = $this->postService->rate($id);

        return redirect()
            ->route('post.show', $post->id)
            ->with('success', ['post' => $post]);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('postEdit', ['post' => $post]);
    }

    /**
     * @param PostRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PostRequest $request, $id)
    {
        $this->postService->update($request, $id);
        return redirect()
            ->route('home')
            ->with('success');
    }

}
