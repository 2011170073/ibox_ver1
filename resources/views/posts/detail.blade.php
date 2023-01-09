<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
         <p>ログインユーザー：{{Auth::user()->name}}</p>
        <h3>{{$post->title}}</h3>
        <p>{{$post->body}}</p>
        <p>{{$post->user->name}}</p>
        <p>{{$post->created_at}}</p>
        <a href="/">戻る</a>
    </body>
</html>