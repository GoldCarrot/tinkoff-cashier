<?php

namespace Goldcarrot\Cashiers\Tinkoff\Enums;

class CardStatus extends Enum
{
    /**
     * Активная
     */
    public const ACTIVE = 'A';

    /**
     * Неактивная
     */
    public const INACTIVE = 'I';

    /**
     * Удаленная
     */
    public const DELETED = 'D';
}