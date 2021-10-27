<?php

namespace Goldcarrot\Cashiers\Tinkoff\Exceptions;

class TinkoffRequestException extends TinkoffException
{
    public function __construct(string $code, ?string $errorMessage = null, ?string $errorDetails = null)
    {
        parent::__construct("Error $code. $errorMessage $errorDetails", $code);
    }
}