<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>

    <h1>Create Post</h1>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <div>
            <label>Title</label>
            <br>
            <input type="text" name="title">
        </div>

        <br>

        <div>
            <label>Content</label>
            <br>
            <textarea name="content" rows="5"></textarea>
        </div>

        <br>

        <button type="submit">Create Post</button>
    </form>

    <br>

    <a href="/posts">Back to Posts</a>

</body>
</html>