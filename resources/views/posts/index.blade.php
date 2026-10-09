
@extends('layouts.admin')

@section('title', 'My Posts')
@section('heading', 'My Posts')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Posts</h1>

        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Create New Post
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($posts->isEmpty())
        <div class="card shadow mb-4">
            <div class="card-body text-center">
                <i class="fas fa-file-alt fa-3x text-gray-300 mb-3"></i>
                <h5>No posts yet</h5>
                <p class="text-muted">Create your first post to get started.</p>

                <a href="{{ route('posts.create') }}" class="btn btn-primary">
                    Create Post
                </a>
            </div>
        </div>
    @else
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-xl-6 col-lg-12 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">
                                {{ $post->title }}
                            </h6>
                        </div>

                        <div class="card-body">
                            <p class="text-gray-800">
                                {{ $post->content }}
                            </p>

                            <hr>

                            <small class="text-muted">
                                <i class="fas fa-user"></i>
                                Author: {{ $post->user->name }}
                            </small>
                        </div>

                        <div class="card-footer bg-white">
                            <a href="{{ route('posts.edit', $post) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('posts.destroy', $post) }}"
                                  class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this post?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
