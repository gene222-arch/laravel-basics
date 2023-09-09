<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/post.css">
</head>
<body>
    <article>
        <h1 class="title">
            {{ $blogPost['id'] }}
            {{ $blogPost['title'] }}
        </h1>
        <p class="body">{{ $blogPost['body'] }}</p>
    </article>
    <a href="/posts">Back</a>
</body>
</html>