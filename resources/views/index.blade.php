<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
</head>
<body>

    <h1>Post List</h1>

    <a href="{{ route('posts.create') }}">Create New Post</a>

    <br><br>

    @foreach ($posts as $post)

        <h2>{{ $post->title }}</h2>

        <p>{{ $post->content }}</p>

        <p>Author: {{ $post->user->name }}</p>

        <a href="{{ route('posts.edit', $post) }}">Edit</a>

        <form method="POST" action="{{ route('posts.destroy', $post) }}">
            @csrf
            @method('DELETE')

            <button type="submit">Delete</button>
        </form>

        <hr>

    @endforeach

</body>
</html>