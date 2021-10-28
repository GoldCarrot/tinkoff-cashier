<?php

namespace Goldcarrot\Cashiers\Tinkoff\Responses;

class AddCustomerResponse extends BaseResponse
{
    /**
     * Идентификатор покупателя в системе продавца
     *
     * @var string
     */
    protected string $CustomerKey;

    public function getCustomerKey(): string
    {
        return $this->CustomerKey;
    }
}