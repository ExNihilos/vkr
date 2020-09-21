<?php


namespace App\Services;


use App\Models\Commentary;
use App\Models\Post;
use App\Models\Rating;
use App\Models\User;
use App\Repositories\CommentaryRepository;
use Illuminate\Support\Facades\Auth;

class CommentaryService
{
    private $commentaryRepository;

    public function __construct()
    {
        $this->commentaryRepository = app(CommentaryRepository::class);
    }


    /**
     * @param $id
     * @return mixed
     */
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
        return $post;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        $commentary = $request->validated();
        $userid = Auth::user()->getAuthIdentifier();
        $user = User::where('id', $userid)->first();
        $commentary['user'] = $user->name;
        $post_id = $request->id;
        $commentary['post_id'] = $post_id;
        $this->commentaryRepository->store($commentary);
        $post = Post::where('id', $post_id)->first();

        return $post;
    }
}
