<?php


namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function store(Array $attributes) {
        return Post::create($attributes);
    }
}
