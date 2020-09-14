<?php

namespace App\Http\Controllers;

use App\Repositories\CommentaryRepository;
use Illuminate\Http\Request;

class CommentaryController extends Controller
{
    private $commentaryRepository;

    public function __construct()
    {
        $this->commentaryRepository = app(CommentaryRepository::class);
    }
}
