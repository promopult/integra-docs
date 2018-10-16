<?php

require_once 'crypt.php';

/* Подготавливаем URL */

$dataJson = json_encode([
    'name' => 'Dmitry'
]);

// Для вызова метода /hello используем hash и cryptKey Партнера
$hash = getenv('__PARTNER_HASH__');
$cryptKey = getenv('__PARTNER_KEY__');

// Для разработки удобно использовать песочницу https://sandbox.seopult.org
$apiHost = getenv('__API_HOST__');

$data = SimpleCrypt::encrypt($dataJson, $cryptKey);

$url = $apiHost.'/iframe/hello?k=zaa' . $hash . urlencode($data);


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
