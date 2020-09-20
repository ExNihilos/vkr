<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentaryRequest;
use App\Http\Requests\PostRequest;
use App\Models\Commentary;
use App\Models\Post;
use App\Models\Rating;
use App\Models\Tag;
use App\Repositories\PostRepository;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


    public function create(Request $request)
    {
        $tags = Tag::lists('name');
        dd($tags);
        return view('layouts.app', compact('tags'));
    }


    public function index()
    {
        $posts = $this->postRepository->getPosts();
        return redirect()->route('home')->with('success', ['posts' => $posts]);
    }


    public function store(Request $post)
    {
//        $tag = Tag::where('name','tag2')->first();
//        echo $tag->name;
//        dd($tag);
        //$request = $request->validated();
        //$post = $request->validated();
        $tags = $post->input('tags') ?? [];
        $post['user_id'] = Auth::user()->getAuthIdentifier();
        //$tags = $post->input('tags');
        $tagsIds = array();
        for($i=0; $i<count($tags); $i++)
        {
            $tag = Tag::where('name', $tags[$i])->first();
            array_push($tagsIds, $tag->id);
        }

       // dd($tagsIds);



      //  $tags2= $post->tags;
      //  dd($tags2, $post);
//        if ($post) {
//            $tagNames = explode(',', $post->input('tags'));
//        }
//        $tagIds = [];
//        foreach ($tagNames as $tagName) {
//            $post->tags()->create(['name' => $tagName]);
//            //Or to take care of avoiding duplication of Tag
//            // //you could substitute the above line as $tag =
//            // \Tag::firstOrCreate(['name'=>$tagName]);
//            // if($tag) { $tagIds[] = $tag->id; } } $post->tags()->sync($tagIds); } }
//        }

       // echo $tagNames;
      //  dd($post, $tagNames);

        $post1 = $this->postRepository->store($post->all());

        $post1->tags()->attach($tagsIds);
//        echo $post; dd($post);
        $posts = $this->postRepository->getPosts();



        return redirect()
            ->route('home')
            ->with('success', ['posts' => $posts]);
//        return view('home', ['posts' => $posts] );// Не перенаправляет на страницу
    }

//    public function getPosts()
//    {
//        $posts = Post::orderBy('created_at', 'desc')
//            ->take(10)
//            ->get();
//
//        return $posts;
//    }

    public function sort($type)
    {
        if ($type === 'rating') {
            $posts = $this->postRepository->sortByRating();
            return view('home', ['posts' => $posts]);
        }

        return $this->index();
    }


    public function showPost($id)
    {
        $post = Post::where('id', $id)->first();
        //$commentaries = Commentary::where('post_id', $id)->get();
        return view('post', ['post' => $post]); // ?
    }


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
            //return view('post', ['post'=>$post]);
        }

        return redirect()
            ->route('post.show', $post->id)
            ->with('success', ['post' => $post]);

    }

    public function edit($id)
    {
        $post=Post::find($id);
        dd($post);
    }

    public function storer(Request $request)
    {
        $post = Post::create(['title' => $request->get('title'), 'body' => $request->get('body')]);
        if ($post) {
            $tagNames = explode(',', $request->input('tags'));
        }
        $tagIds = [];
        foreach ($tagNames as $tagName) {
            $post->tags()->create(['name' => $tagName]);
            //Or to take care of avoiding duplication of Tag
            // //you could substitute the above line as $tag =
            // \Tag::firstOrCreate(['name'=>$tagName]);
            // if($tag) { $tagIds[] = $tag->id; } } $post->tags()->sync($tagIds); } }
        }

    }
}
