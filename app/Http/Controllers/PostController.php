<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
public function index()
{
    $posts = Post::with('user')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('posts.index', compact('posts'));
}


    public function create()
    {
        return view('posts.create');
    }

    
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string|min:10',
    ], [
        'title.required' => 'Please enter a post title.',
        'title.max' => 'The title must not exceed 255 characters.',
        'content.required' => 'Please enter post content.',
        'content.min' => 'Content must be at least 10 characters.',
    ]);

    Post::create([
        'user_id' => auth()->id(),
        'title' => $validated['title'],
        'content' => $validated['content'],
    ]);

    return redirect('/posts')
        ->with('success', 'Post created successfully!');
}


    public function edit(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    
public function update(Request $request, Post $post)
{
    if ($post->user_id !== auth()->id()) {
        abort(403);
    }

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string|min:10',
    ], [
        'title.required' => 'Please enter a post title.',
        'title.max' => 'The title must not exceed 255 characters.',
        'content.required' => 'Please enter post content.',
        'content.min' => 'Content must be at least 10 characters.',
    ]);

    $post->update([
        'title' => $validated['title'],
        'content' => $validated['content'],
    ]);

    return redirect('/posts')
        ->with('success', 'Post updated successfully!');
}

    public function destroy(Post $post)
{
    if ($post->user_id !== auth()->id()) {
        abort(403);
    }

    $post->delete();

    return redirect('/posts');
}
}
