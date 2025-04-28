<?php

namespace PersonLinks\Internship;
use Exception;

class Env
{
    public static function load(string $path)
    {
        if (!file_exists($path)) {
            throw new Exception(".env not found at $path");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach( $lines as $line ) {

            if( preg_match("/[a-zA-Z_]+=[a-zA-Z0-9!_\"@.]+/i", $line, $matches) ) {
                // echo "matches: <pre>" . print_r($matches) . '</pre>';
                [$key, $value] = explode("=", $matches[0]);
                if(!array_key_exists($key, $_ENV)) {
                    $_ENV[$key] = $value;
                }
            }
        }

    }
}