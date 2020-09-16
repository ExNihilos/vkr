<?php


namespace App\Repositories;

use App\Models\Post;
use PhpParser\Node\Expr\Array_;

class PostRepository
{
    public function store(Array $post) {
        return Post::create($post);
    }

    public function getPosts(Array $attributes) {
        return Post::orderBy('created_at', 'desc')
            ->take(10)
            ->get();
    }

    public function sortByRating(Array $attributes) {
        return Post::orderBy('rating')
            ->take(10)
            ->get();
    }
}
