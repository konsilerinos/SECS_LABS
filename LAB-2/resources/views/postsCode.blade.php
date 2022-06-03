<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>Laravel LAB-2</title>
    </head>
    <body>
        <div class="container-fluid mt-5">
            <h6>Теги</h6>
            <div class="row">
                @foreach ($tags as $tag)
                    <div>
                        <p>{{ $tag->name }}</p>
                    </div>
                @endforeach
            </div>

            <p>{{ $article->id }}</p>
            <p>{{ $article->name }}</p>
            <p>{{ $article->token }}</p>
            <p>{{ $article->text }}</p>
            <p>{{ $article->dateOfCreated }}</p>
            <p>{{ $article->author }}</p>

            {{ $tags->links() }}
    </body>
</html>
