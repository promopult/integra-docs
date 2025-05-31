<?php

/**
 * Заглушка класса шифрования. Реальный исходный код будет предоставлен на этапе интеграции.
 */
class SimpleCrypt implements CryptInterface
{
    public function encrypt(string $string, string $key): string
    {
        return base64_encode($string);
    }

    public function decrypt(string $string, string $key): string
    {
        return base64_decode($string);
    }
}

interface CryptInterface {
    public function encrypt(string $string, string $key): string;
    public function decrypt(string $string, string $key): string;
}