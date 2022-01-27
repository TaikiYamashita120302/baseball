<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Top</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>トップページ</h1>
        <div class='posts'>
            [<a href= '/posts/create'>試合投稿</a>]
            @foreach($posts as $post)
            <div class='post'>
            <h2 class = 'title'>
                <a href ="/posts/{{ $post->id }}">title</a>
            </h2>
            </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>