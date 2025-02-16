<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAll();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.posts.create', compact('users'));
    }

    public function store(PostRequest $request)
    {
        $this->postService->create($request->validated());
        return redirect()->route('admin.posts.index')->with('success', 'Post added successfully');
    }

    public function edit($id)
    {
        $post = $this->postService->findById($id);
        $users = User::all();
        return view('admin.posts.edit', compact('post', 'users'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = $this->postService->findById($id);
        $this->postService->update($post, $request->validated());
        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $post = $this->postService->findById($id);
        $this->postService->delete($post);
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully');
    }
}
