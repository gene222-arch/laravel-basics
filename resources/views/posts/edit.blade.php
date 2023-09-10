<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- 1. Form
    2. set the action and method
    3. add the token for security --}}

    <form action="/posts/{{ $post->id }}" method="post">
        @csrf
        @method('PUT')

        <label for="">Title</label>
        <input type="text" name="title" value="{{ $post->title }}">

        <label for="">Body</label>
        <input type="text" name="body" value="{{ $post->body }}">

        <button type="submit">Update</button>
    </form>
</body>
</html>