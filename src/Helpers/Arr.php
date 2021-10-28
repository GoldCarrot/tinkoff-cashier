<?php

namespace Goldcarrot\Cashiers\Tinkoff\Helpers;

class Arr
{
    public static function get($array, string $key, $default = null)
    {
        if (is_array($array)) {
            return $array[$key] ?? $default;
        }

        return $default;
    }

    public static function has($array, string $key): bool
    {
        if (is_array($array)) {
            return array_key_exists($key, $array);
        }

        return false;
    }
}