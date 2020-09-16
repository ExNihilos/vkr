<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentaryRequest;
use App\Repositories\CommentaryRepository;
use Illuminate\Http\Request;

class CommentaryController extends Controller
{
    private $commentaryRepository;

    public function __construct()
    {
        $this->commentaryRepository = app(CommentaryRepository::class);
    }

    public function addCommentary(CommentaryRequest $request)
    {
//        dd($request);
//        $commentary = new Commentary();
//        $commentary->text = $request->input('text');
//        $commentary->post_id = 10;
//        $commentary->user = "aaa";
//        $commentary->save();
//        return redirect()
//            ->route('home')
//            ;//->with('success',  "Запись успешно сохранена!  Cсылка на пасту: /commentary/link/$hash");


        $commentary = $request->validated();
        $commentary = $this->commentaryRepository->store($commentary);

    }
}
