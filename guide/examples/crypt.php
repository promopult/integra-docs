<?php

/**
 * Class SimpleCrypt
 *
 * Заглушка класса шифрования. Реальный исходный код класса уникальный
 * для каждого партнера и будет предоставлен на этапе интеграции.
 *
 * @author Dmitry Gladyshev <dgladyshev@promopult.ru>
 */
class SimpleCrypt implements CryptInterface
{
    /**
     * {@inheritdoc}
     */
    public static function encrypt(string $string, string $key): string
    {
        return base64_encode($string);
    }

    /**
     * {@inheritdoc}
     */
    public static function decrypt(string $string, string $key): string
    {
        return base64_decode($string);
    }
}

interface CryptInterface {
    public static function encrypt(string $string, string $key): string;
    public static function decrypt(string $string, string $key): string;
}