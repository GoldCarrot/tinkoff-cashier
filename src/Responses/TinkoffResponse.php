<?php

namespace Goldcarrot\Cashiers\Tinkoff\Responses;

use Goldcarrot\Cashiers\Tinkoff\Exceptions\TinkoffRequestException;
use Illuminate\Support\Arr;
use Psr\Http\Message\ResponseInterface;

abstract class TinkoffResponse
{
    public function __construct(ResponseInterface $response)
    {
        $response = json_decode($response->getBody()->getContents(), true);

        if (!Arr::get($response, 'Success', false)) {
            $code = Arr::get($response, 'ErrorCode');
            $errorMessage = Arr::get($response, 'Message');
            $errorDetails = Arr::get($response, 'Details');

            throw new TinkoffRequestException($code, $errorMessage, $errorDetails);
        }

        $this->parseResponse($response);
    }

    abstract protected function parseResponse(array $response);
}