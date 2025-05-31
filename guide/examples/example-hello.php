<?php

require_once 'crypt.php';

/* Подготавливаем URL */

$dataJson = json_encode([
    'name' => 'Dmitry'
]);

// Для вызова метода /hello используем hash и cryptKey Партнера
$hash = getenv('__PARTNER_HASH__');
$cryptKey = getenv('__PARTNER_KEY__');

$data = (new SimpleCrypt)->encrypt($dataJson, $cryptKey);

$url = 'https://sandbox.promopult.org/iframe/hello?k=zaa' . $hash . urlencode($data);


/* Вызываем API */

$streamContext = stream_context_create([
    'http' => [
        'method' => 'GET',
        'header' => "Content-type: application/json\r\n"
    ]
]);

$response = file_get_contents($url, false, $streamContext);

var_dump($response);

/*
{
  status: {
    code: 0,
    message: "ok"
  },
  error: false,
  data: "Hello, Dmitry!"
}
*/
