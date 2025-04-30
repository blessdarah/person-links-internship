<?php

declare(strict_types=1);

namespace PersonLinks\Internship\app\core;

class FormRequest
{
    public static function all()
    {
        return match ($_SERVER['REQUEST_METHOD']) {
            'GET' => $_GET,
            'POST' => $_POST,
        };
    }

    public static function get(string $key): mixed
    {
        return match ($_SERVER['REQUEST_METHOD']) {
            'GET' => $_GET[$key] ?? null,
            'POST' => $_POST[$key] ?? null,
        };
    }

    public static function has(string $key): bool
    {
        return match ($_SERVER['REQUEST_METHOD']) {
            'GET' => isset($_GET[$key]),
            'POST' => isset($_POST[$key]),
        };
    }

    public static function only(array $keys): array
    {
        $data = self::all();

        return array_intersect_key($data, array_flip($keys));
    }
}
