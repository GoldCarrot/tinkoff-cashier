# Tinkoff Cashier

PHP implementation of [Tinkoff Merchant API v2](https://www.tinkoff.ru/kassa/develop/).

## Installation

```
composer require goldcarrot/tinkoff-cashier
```

## How to use

```php
use GuzzleHttp\Client;
use Goldcarrot\Cashiers\Tinkoff\Tinkoff;

$client = new Client();
$terminalKey = 'your-terminal-key';
$password = 'your-password';

$bankApi = new Tinkoff($client, $terminalKey, $password);
```

## Creating a payment

```php
use Goldcarrot\Cashiers\Tinkoff\Values\Init;

$orderId = 'your-order-id';
$data = new Init($orderId);
$data
    ->setAmount(1000)
    ->setSuccessURL("https://site.com/invoice/$orderId/success");
    
$response = $bankApi->init($data);

$paymentId = $response->getPaymentId();

redirect($response->getPaymentURL());

```

## Checking payment

```php
use Goldcarrot\Cashiers\Tinkoff\Values\GetState;
use Goldcarrot\Cashiers\Tinkoff\Enums\PaymentStatus;

$orderId = 'your-order-id';
$data = GetState::make($orderId);
    
$response = $bankApi->getState($data);

if ($response->getStatus() === PaymentStatus::CONFIRMED) {
    // after success actions
} else {
    // after failure actions
}
```
