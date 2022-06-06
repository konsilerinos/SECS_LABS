<?php

namespace App\Telegram;

class Telegram {
    protected $http;
    protected $bot;
    const partBotUrl = 'https://api.tlgr.org';

    public function __construct(Http $http, $bot) {
        $this->http = $http;
        $this->bot = $bot;
    }

    // Телеграм бот отправляет сообщение
    public function SendMessage($chatId, $message) {
        // Фасад Http
        return $this->http::post(self::partBotUrl.$this->bot.'/sendMessage', [ // Ключ бота скрыт
            // Идентификатор чата (скрыт)
            'chat_id' => $chatId,            
            // Сообщение
            'text'    => $message, 
            // Отображение html тегов для 'text'
            'parse_mode' => 'html'        
        ]);
    }

    // Телеграм бот отправляет сообщение
    public function EditMessage($chatId, $message, $messageId) {
        // Фасад Http
        return $this->http::post(self::partBotUrl.$this->bot.'/sendMessage', [ // Ключ бота скрыт
            // Идентификатор чата (скрыт)
            'chat_id' => $chatId,            
            // Сообщение
            'text'    => $message, 
            // Отображение html тегов для 'text'
            'parse_mode' => 'html',
            // Какое сообщение редактировать
            'message_id' => $messageId    
        ]);
    }

    // Телеграм бот отправляет файл
    public function SendDocument($chatId, $file) {
        // Фасад Http
        return $this->http::attach('document', Storage::get($file, 'Volga.png'))->post(self::partBotUrl.$this->bot.'/sendMessage', [
            'chat_id' => $chatId,
        ]);
    }

    // Телеграм бот отправляет кнопку
    public function SendButton($chatId, $message, $button) {
        // Фасад Http
        return $this->http::post(self::partBotUrl.$this->bot.'/sendMessage', [ // Ключ бота скрыт
            // Идентификатор чата (скрыт)
            'chat_id' => $chatId,            
            // Сообщение
            'text'    => $message, 
            // Отображение html тегов для 'text'
            'parse_mode' => 'html',
            // Кнопки
            'reply_markup' => $button
        ]);
    }

    // Редактирование кнопок телеграм бота
    public function EditButtons($chatId, $message, $button, $messageId) {
        // Фасад Http
        return $this->http::post(self::partBotUrl.$this->bot.'/editMessageText', [ // Ключ бота скрыт
            // Идентификатор чата (скрыт)
            'chat_id' => $chatId,            
            // Сообщение
            'text'    => $message, 
            // Отображение html тегов для 'text'
            'parse_mode' => 'html',
            // Кнопки
            'reply_markup' => $button,
            // Какую кнопку редактировать
            'message_id' => $messageId
        ]);
    }
}
?>