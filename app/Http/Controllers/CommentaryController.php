<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentaryRequest;
use App\Models\Commentary;
use App\Models\User;
use App\Repositories\CommentaryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaryController extends Controller
{
    private $commentaryRepository;

    public function __construct()
    {
        $this->commentaryRepository = app(CommentaryRepository::class);
    }

    public function showCommentary()
    {
        return view('commentary');
    }


    public function store(CommentaryRequest $request)
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

        dd($request);
        $commentary = $request->validated();
        $userid = Auth::user()->getAuthIdentifier();
        $user=User::where('id',$userid)->first();
        $commentary['user'] = $user;
        $commentary = $this->commentaryRepository->store($commentary);


        $commentary = $this->commentaryRepository->store($commentary);

    }
}
