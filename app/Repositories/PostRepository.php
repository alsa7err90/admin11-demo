<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function getAll()
    {
        return Post::with('user')->get();
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function findById($id)
    {
        return Post::findOrFail($id);
    }

    public function update(Post $item, array $data)
    {
        $item->update($data);
        return $item;
    }

    public function delete(Post $item)
    {
        return $item->delete();
    }
}
