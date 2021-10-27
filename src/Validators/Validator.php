<?php

namespace Goldcarrot\Cashiers\Tinkoff\Validators;

use DateTime;
use Exception;
use Goldcarrot\Cashiers\Tinkoff\Enums\Enum;
use Goldcarrot\Cashiers\Tinkoff\Exceptions\ValidationException;

class Validator
{
    /**
     * @param string      $enumClass
     * @param             $value
     * @param string|null $errorMessage
     *
     * @throws ValidationException
     */
    public static function validateEnum(string $enumClass, $value, string $errorMessage = null)
    {
        if (is_subclass_of($enumClass, Enum::class)) {
            if (!$enumClass::isValid($value)) {
                throw new ValidationException($errorMessage ?: "Given value is not a constant of $enumClass");
            }
        }
    }

    /**
     * @param             $value
     * @param string|null $errorMessage
     *
     * @throws ValidationException
     */
    public static function validateEmail($value, string $errorMessage = null)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new ValidationException($errorMessage ?: "Given value is not an email");
        }
    }

    /**
     * @param             $value
     * @param string|null $errorMessage
     *
     * @throws ValidationException
     */
    public static function validatePhone($value, string $errorMessage = null)
    {
        if (!preg_match('/^\+\d+$/', $value)) {
            throw new ValidationException($errorMessage ?: "Given value is not a correct phone number");
        }
    }

    /**
     * @param             $value
     * @param string|null $errorMessage
     *
     * @throws ValidationException
     */
    public static function validatePhones($value, string $errorMessage = null)
    {
        foreach ((array)$value as $item) {
            self::validatePhone($item, $message);
        }
    }

    /**
     * @param             $value
     * @param string|null $errorMessage
     *
     * @throws ValidationException
     */
    public static function validatePositiveNumber($value, string $errorMessage = null)
    {
        if (!is_numeric($value) || $value <= 0) {
            throw new ValidationException($errorMessage ?: "Given value is not a positive number");
        }
    }

    public static function validateIp($value, string $errorMessage = null)
    {
        if (!filter_var($value, FILTER_VALIDATE_IP)) {
            throw new ValidationException($errorMessage ?: "Given value is not a positive number");
        }
    }

    public static function validateDateFormat($value, string $format, string $errorMessage = null)
    {
        try {
            $datetime = new DateTime($value);

            if ($datetime->format($format) !== $value) {
                throw new Exception();
            }
        } catch (Exception $e) {
            throw new ValidationException($errorMessage ?: 'Given value has invalid date format');
        }
    }

    public static function validateURL(string $value, string $errorMessage = null)
    {
        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            throw new ValidationException($errorMessage ?: 'Given value is not a valid url');
        }
    }

    public static function validateInstances($value, $needClass, string $errorMessage = null)
    {
        foreach ((array)$value as $item) {
            if (get_class($item) !== $needClass) {
                throw new ValidationException($errorMessage ?: "Given values must be instance of $needClass");
            }
        }
    }
}