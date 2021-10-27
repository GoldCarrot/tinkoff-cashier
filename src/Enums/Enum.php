<?php

namespace Goldcarrot\Cashiers\Tinkoff\Enums;

use ReflectionClass;
use ReflectionClassConstant;

abstract class Enum
{
    public static function isValid($value): bool
    {
        return in_array($value, self::getPublicConstantValues());
    }

    private static function getPublicConstantValues(): array
    {
        $reflectionConstants = array_filter(
            (new ReflectionClass(static::class))->getConstants(),

            function (ReflectionClassConstant $reflectionConstant) {
                return $reflectionConstant->isPublic();
            }
        );

        return array_map(function (ReflectionClassConstant $reflectionConstant) {
            return $reflectionConstant->getValue();
        }, $reflectionConstants);
    }
}