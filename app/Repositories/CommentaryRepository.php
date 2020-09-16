<?php

namespace App\Repositories;

use App\Models\Commentary;

class CommentaryRepository
{
    public function store(Array $commentary)
    {
        return Commentary::create($commentary);
    }
}
