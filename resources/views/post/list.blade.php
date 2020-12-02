<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Hello World !</h1>

    @foreach ($posts as $post)

    <div class="card" style="width: 18rem;">
        <img src="{{ $post->image_url }}" class="card-img-top" alt="">
        <div class="card-body">
            <p class="card-text">{{ $post->title }}</p>
        </div>
    </div>

    @endforeach

</body>
</html>
