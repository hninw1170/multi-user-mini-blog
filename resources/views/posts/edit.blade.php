<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>

    <h1>Edit Post</h1>

    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Title</label>
            <br>
            <input type="text" name="title" value="{{ $post->title }}">
        </div>

        <br>

        <div>
            <label>Content</label>
            <br>
            <textarea name="content" rows="5">{{ $post->content }}</textarea>
        </div>

        <br>

        <button type="submit">Update Post</button>
    </form>

    <br>

    <a href="/posts">Back to Posts</a>

</body>
</html>