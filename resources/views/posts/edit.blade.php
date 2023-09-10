<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Links for Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    {{-- 1. Form
    2. set the action and method
    3. add the token for security --}}

    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif --}}

    <form action="/posts/{{ $post->id }}" method="post" class="text-center mt-5 w-50 mx-auto">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input class="form-control mb-2 @error('title') is-invalid @enderror" type="text" name="title" value="{{ $post->title }}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Body --}}
        <label for="exampleFormControlInput1" class="form-label">Body</label>
        <input class="form-control @error('body') is-invalid @enderror" type="text" name="body" value="{{ $post->body }}">
        @error('body')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <button class="btn btn-success mt-3" type="submit">Save</button>
    </form>

    {{-- Scripts for Boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>