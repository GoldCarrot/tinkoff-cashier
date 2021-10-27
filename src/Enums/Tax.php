<?php

namespace Goldcarrot\Cashiers\Tinkoff\Enums;

class Tax extends Enum
{
    /**
     * без НДС
     */
    public const NONE = 'none';

    /**
     * 0%
     */
    public const VAT0 = 'vat0';

    /**
     * 10%
     */
    public const VAT10 = 'vat10';

    /**
     * 20%
     */
    public const VAT20 = 'vat20';

    /**
     * 10/110
     */
    public const VAT110 = 'vat110';

    /**
     * 20/120
     */
    public const VAT120 = 'vat120';
}