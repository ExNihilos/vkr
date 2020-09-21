<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentaryRequest;
use App\Models\Commentary;
use App\Repositories\CommentaryRepository;
use App\Services\CommentaryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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
     * @return Application|Factory|View
     */
    public function showCommentary()
    {
        return view('commentary');
    }

    /**
     * @param CommentaryRequest $request
     * @return RedirectResponse
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
     * @return RedirectResponse
     */
    public function rate($id)
    {
        $post = $this->commentaryService->rate($id);
        return redirect()
            ->route('post.show', $post->id)
            ->with('success', ['id' => $post]);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $commentary = Commentary::find($id);
        $postId = $commentary->post->id;
        return view('commentaryEdit', ['commentary' => $commentary, 'id' => $postId]);
    }

    /**
     * @param CommentaryRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(CommentaryRequest $request, $id)
    {
        $commentary=$this->commentaryService->update($request, $id);
        $postId=$commentary->post->id;
        return redirect()
            ->route('post.show', $postId)
            ->with('success');
    }
}
