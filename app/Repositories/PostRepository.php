<?php


namespace App\Repositories;

use App\Models\Post;
use PhpParser\Node\Expr\Array_;

class PostRepository
{
    public function store(Array $post) {
        return Post::create($post);
    }

    public function update(Array $post) {
        return Post::update($post);
    }

    public function getPosts() {
        return Post::orderBy('created_at', 'desc')
            ->take(10)
            ->get();
    }

    public function sortByRating() {
        return Post::orderBy('rating', 'desc')
            ->take(10)
            ->get();
    }

}
