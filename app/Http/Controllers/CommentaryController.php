<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentaryRequest;
use App\Repositories\CommentaryRepository;
use App\Services\CommentaryService;

class CommentaryController extends Controller
{
    private $commentaryRepository;
    private $commentaryService;

    public function __construct()
    {
        $this->commentaryRepository = app(CommentaryRepository::class);
        $this->commentaryService = app(CommentaryService::class);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCommentary()
    {
        return view('commentary');
    }

    /**
     * @param CommentaryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentaryRequest $request)
    {
        $post = $this->commentaryService->store($request);

        return redirect()
            ->route('post.show', $post->id)
            ->with('success', ['post' => $post]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function rate($id)
    {
        $post = $this->commentaryService->rate($id);
        return redirect()
            ->route('post.show', $post->id)
            ->with('success', ['id' => $post]);
    }
}
