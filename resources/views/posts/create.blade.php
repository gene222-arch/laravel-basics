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
    <form action="/posts" method="post">
        @csrf
        <input type="text" name="title">
        <input type="text" name="body">
        <input type="text" name="body_1">
        <button type="submit">Create</button>
    </form>
</body>
</html>