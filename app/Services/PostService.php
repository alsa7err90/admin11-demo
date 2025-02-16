<?php

namespace App\Services;

use App\Repositories\PostRepository;
use App\Models\Post;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAll()
    {
        return $this->postRepository->getAll();
    }

    public function create(array $data)
    {
        return $this->postRepository->create($data);
    }

    public function findById($id)
    {
        return $this->postRepository->findById($id);
    }

    public function update(Post $post, array $data)
    {
        return $this->postRepository->update($post, $data);
    }

    public function delete(Post $post)
    {
        return $this->postRepository->delete($post);
    }
}
