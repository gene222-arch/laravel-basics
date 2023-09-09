<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Posts</title>
    <link rel="stylesheet" href="post.css">
</head>
<body>
    @foreach ($posts as $p)
        <article>
            <h1 class="title">
                <a href="/post/{{ $p->id }}">{{ $p->title }}</a>
                <a href="/posts/{{ $p->id }}/edit">Edit</a>
                <form action="/posts/{{ $p->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </h1>
            <p class="body">{{ $p->body }}</p>
        </article>
    @endforeach
</body>
</html>