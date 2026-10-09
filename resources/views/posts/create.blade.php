
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
            <label for="title">Title</label>
            <br>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
            >

            @error('title')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="content">Content</label>
            <br>
            <textarea
                id="content"
                name="content"
                rows="5"
            >{{ old('content') }}</textarea>

            @error('content')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Create Post</button>
    </form>

    <br>

    <a href="/posts">Back to Posts</a>

</body>
</html>
