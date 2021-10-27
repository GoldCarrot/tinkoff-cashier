<?php

namespace Goldcarrot\Cashiers\Tinkoff\Enums;

class PayType extends Enum
{
    /**
     * Одностадийная
     */
    public const ONE_STAGE = 'O';

    /**
     * Двухстадийная
     */
    public const TWO_STAGE = 'T';

}