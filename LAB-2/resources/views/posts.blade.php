<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <p>Фильтры</p>
        <form method="GET" style="width: 250px; margin: 5px;">
            <p>Токен</p>
            <input type="text" id="token" name="tokenInput" class="form-control form-control-sm"></input>
            <p>Тэг</p>
            <input type="text" id="tag" name="tagInput" class="form-control form-control-sm"></input>
            <input type="submit" class="btn btn-primary mt-2 mb-5" value="Отфильтровать"></input>
            <p>Название</p>
            <input type="text" id="name" name="nameInput" class="form-control form-control-sm"></input>
        </form>

        <div>
            @foreach($articles as $article)
                <p>{{ $article->id }}</p>
                <p>{{ $article->name }}</p>
                <p>{{ $article->token }}</p>
                <p>{{ $article->text }}</p>
                <p>{{ $article->dateOfCreated }}</p>
                <p>{{ $article->author }}</p>
            @endforeach
        </div>

        {{ $articles->withQueryString()->links() }}
    </body>
</html>
