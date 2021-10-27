<?php

namespace Goldcarrot\Cashiers\Tinkoff\Responses;


use Illuminate\Support\Arr;

class InitResponse extends TinkoffResponse
{
    protected string $TerminalKey;
    protected string $Status;
    protected string $PaymentId;
    protected string $OrderId;
    protected int    $Amount;
    protected string $PaymentURL;

    protected function parseResponse(array $response)
    {
        $this->TerminalKey = Arr::get($response, 'TerminalKey');
        $this->Status = Arr::get($response, 'Status');
        $this->PaymentId = Arr::get($response, 'PaymentId');
        $this->OrderId = Arr::get($response, 'OrderId');
        $this->Amount = Arr::get($response, 'Amount');
        $this->PaymentURL = Arr::get($response, 'PaymentURL');
    }

    public function terminalKey(): string
    {
        return $this->TerminalKey;
    }

    public function status(): string
    {
        return $this->Status;
    }

    public function paymentId(): string
    {
        return $this->PaymentId;
    }

    public function orderId(): string
    {
        return $this->OrderId;
    }

    public function amount(): int
    {
        return $this->Amount;
    }

    public function paymentURL(): string
    {
        return $this->PaymentURL;
    }
}