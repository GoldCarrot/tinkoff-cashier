<?php

namespace Goldcarrot\Cashiers\Tinkoff\Enums;

class Source extends Enum
{
    public const CARDS      = 'Cards';
    public const APPLE_PAY  = 'ApplePay';
    public const GOOGLE_PAY = 'GooglePay';
}