<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentaryRequest;
use App\Models\Commentary;
use App\Models\Post;
use App\Models\Rating;
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

//        $commentary = new Commentary();
//        $commentary->text = $request->input('text');
//        $commentary->post_id = 10;
//        $commentary->user = "aaa";
//        $commentary->save();
//        return redirect()
//            ->route('home')
//            ;//->with('success',  "Запись успешно сохранена!  Cсылка на пасту: /commentary/link/$hash");


        $commentary = $request->validated();
        $userid = Auth::user()->getAuthIdentifier();
        $user = User::where('id', $userid)->first();
        $commentary['user'] = $user->name;
        $post_id = $request->id;
        $commentary['post_id'] = $post_id;

        $commentary = $this->commentaryRepository->store($commentary);
        $post = Post::where('id', $post_id)->first();
      //  return view('post', ['post' => $post]);
        return redirect()
            ->route('post.show', $post->id)
            ->with('success', ['post' => $post]);
    }

    public function rate($id)
    {
        $userId = Auth::user()->getAuthIdentifier();
        $commentary= Commentary::where('id', $id)->first();

        if (is_null(Rating::where([['subject_id', $id], ['user_id', $userId], ['subject_type', 'commentary']])->first())) {
            $rating[] = new Rating();
            $rating['user_id'] = $userId;
            $rating['subject_id'] = $id;
            $rating['subject_type'] = 'commentary';
            Rating::create($rating);

            $commentary->rating += 1;
            $commentary->save();
        }

        $post = $commentary->post;

        return redirect()
            ->route('post.show', $post->id)
            ->with('success', ['id' => $post]);

    }
}
