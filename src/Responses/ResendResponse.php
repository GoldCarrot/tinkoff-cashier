<?php

namespace Goldcarrot\Cashiers\Tinkoff\Responses;

class ResendResponse extends BaseResponse
{
    /**
     * Количество сообщений, отправляемых повторно
     *
     * @var int
     */
    protected int $Count;

    public function getCount(): int
    {
        return $this->Count;
    }
}