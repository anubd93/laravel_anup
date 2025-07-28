<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function create($data)
    {
        return Post::create($data);
    }

    public function getAll()
    {
        return Post::all();
    }

    public function getById($id)
    {
        return Post::findOrFail($id);
    }
}