<?php

namespace Goldcarrot\Cashiers\Tinkoff\Responses;

use Goldcarrot\Cashiers\Tinkoff\Helpers\Arr;
use Goldcarrot\Cashiers\Tinkoff\Values\Card;

class GetCardListResponse extends BaseResponse
{
    /**
     * @var array<Card>
     */
    protected array $cards = [];

    protected function parseResponse(array $response)
    {
        foreach ($response as $card) {
            $this->cards[] = new Card(
                Arr::get($card, 'CardId'),
                Arr::get($card, 'Pan'),
                Arr::get($card, 'ExpDate'),
                Arr::get($card, 'CardType'),
                Arr::get($card, 'Status'),
                Arr::get($card, 'RebillId'),
            );
        }
    }
}