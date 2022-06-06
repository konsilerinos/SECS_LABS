<?php

//localization Vue
Route::get('/js/ru.js', 'LocaleController@assets_ru')->name('assets.lang.ru');
Route::get('/js/en.js', 'LocaleController@assets_en')->name('assets.lang.en');

Route::get('logout', 'Api\AuthController@logout_get')->name('logout_get');
Route::post('logout', 'Api\AuthController@logout_get')->name('logout');
Route::get('login', 'Api\AuthController@login_get')->name('login');

// Бот создавался в @BotFather

Route::get('/', function (\App\Exceptions\Handler\Telegram $telegram) {
    // Отправка сообщения
    $message = '<b>REST API<\b> телеграм бот\n1. Отлавливание ошибок\n<i>Слесарев Николай, ПИН-32</i>';
    $telegram->SendMessage(11111, $message);

    // Отправка изображений
    $telegram->SendMessage(11111,  'Проверка: отправка изображения (ГАЗ, ЗИЛ")');
    $telegram->SendDocument(11111, '/public/Volga.png');
    $telegram->SendDocument(11111, '/public/ZIL.png');
    $telegram->SendDocument(11111, '/public/Shishiga.png');

    // Отправка кнопок
    $buttons = [
        'inlint_keyboard' => [
            [
                'text' => 'Нажми меня',
                'callback_data' => '1'
            ],
            [
                'text' => 'Нет, нажми меня',
                'callback_data' => '2'
            ],
            [
                'text' => 'Не нажимай нас!',
                'callback_data' => '2'
            ]
        ]
    ];
    $telegram->SendMessage(11111,  'Проверка: отправка кнопок (3)');
    $telegram->SendButton(11111,   'Отправка кнопок', json_encode($buttons));
});

//dev
Route::get('/icons', function () {
    return view('icons');
});
Route::get('/content', function () {
    return view('content');
});
Route::get('/content2', function () {
    return view('content2');
});

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
