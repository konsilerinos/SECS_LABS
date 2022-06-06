Внимание! Обнаружена ошибка в {{env('APP_NAME')}}

<b>Файл: </b> <code>{{$file}}</code>

<b>Строка: </b> <code>{{$line}}</code>

<b>Описание: </b> <code>{{$description}}</code>

<b>Пользователь: </b><a href="t.me/{{Auth::user()->telegram_username}}">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</a>