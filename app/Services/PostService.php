<?php


namespace App\Services;


use App\Models\Post;
use App\Models\Rating;
use App\Models\Tag;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class PostService
{
    private $postRepository;

    public function __construct(){

        $this->postRepository = app(PostRepository::class);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function rate($id)
    {
        $userId = Auth::user()->getAuthIdentifier();
        $post = Post::where('id', $id)->first();

        if (is_null(Rating::where([['subject_id', $id], ['user_id', $userId], ['subject_type', 'post']])->first())) {
            $rating[] = new Rating();
            $rating['user_id'] = $userId;
            $rating['subject_id'] = $id;
            $rating['subject_type'] = 'post';
            Rating::create($rating);
            $post->rating += 1;
            $post->save();
        }

        return $post;
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id){
        $post = Post::find($id);
        $post->title = $request->title;
        $post->text = $request->text;
        $post->save();
        return $post;
    }

    /**
     * @param $post
     * @return mixed
     */
    public function store($post)
    {
        $tags = $post->input('tags') ?? [];
        $post['user_id'] = Auth::user()->getAuthIdentifier();
        $tagsIds = array();

        for($i=0; $i<count($tags); $i++)
        {
            $tag = Tag::where('name', $tags[$i])->first();
            array_push($tagsIds, $tag->id);
        }

        $post = $this->postRepository->store($post->all());
        $post->tags()->attach($tagsIds);

        $posts = $this->postRepository->getPosts();
        return $posts;

    }
}
