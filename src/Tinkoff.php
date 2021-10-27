<?php

namespace Goldcarrot\Cashiers\Tinkoff;

use Goldcarrot\Cashiers\Tinkoff\Responses\InitResponse;
use Goldcarrot\Cashiers\Tinkoff\Values\Charge;
use Goldcarrot\Cashiers\Tinkoff\Values\Init;
use GuzzleHttp\ClientInterface;

class Tinkoff
{
    private ClientInterface $client;
    private string          $apiUrl = 'https://securepay.tinkoff.ru/v2';
    private string          $terminalKey;
    private string          $password;

    public function __construct(
        ClientInterface $client,
        string $terminalKey,
        string $password,
        string $apiUrl = null
    )
    {
        $this->client = $client;
        $this->terminalKey = $terminalKey;
        $this->password = $password;
        $this->apiUrl = $apiUrl ?: $this->apiUrl;
    }

    /**
     * @param Init $init
     *
     * @return InitResponse
     * @throws Exceptions\TinkoffRequestException
     */
    public function init(Init $init): InitResponse
    {
        $response = $this->execute('Init', $init->toArray());

        return new InitResponse($response);
    }

    public function charge(Charge $charge)
    {
        return $this->execute('Charge', $charge->toArray());
    }

    private function execute(string $action, array $body)
    {
        return $this->client->request(
            'POST',
            $this->apiUrl . '/' . ltrim($action, '/'),
            [
                'json' => $this->prepareBody($body),
            ]
        );
    }

    private function prepareBody(array $body): array
    {
        return array_merge($body, [
            'TerminalKey' => $this->terminalKey,
            'Token'       => $this->generateToken($body),
        ]);
    }

    private function generateToken(array $body): string
    {
        $body = array_merge($body, [
            'TerminalKey' => $this->terminalKey,
            'Password'    => $this->password,
        ]);

        ksort($body);

        return hash('sha256', implode(null, $body));
    }
}