<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    use HasFactory;
    protected $fillable = ['text', 'user', 'post_id'];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
