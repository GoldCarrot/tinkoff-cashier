<?php

namespace Goldcarrot\Cashiers\Tinkoff\Values;

use Goldcarrot\Cashiers\Tinkoff\Validators\Validator;

class Payments
{
    /**
     * Вид оплаты "Наличные". Сумма к оплате в копейках не более 14 знаков.
     *
     * @var int|null
     */
    protected ?int $Cash;

    /**
     * Вид оплаты "Безналичный".
     *
     * @var int
     */
    protected int $Electronic;

    /**
     * Вид оплаты "Предварительная оплата (Аванс)".
     *
     * @var int|null
     */
    protected ?int $AdvancePayment;

    /**
     * Вид оплаты "Постоплата (Кредит)"
     *
     * @var int|null
     */
    protected ?int $Credit;

    /**
     * Вид оплаты "Иная форма оплаты".
     *
     * @var int|null
     */
    protected ?int $Provision;

    public function __construct(int $Electronic)
    {
        $this->setElectronic($Electronic);
    }

    public static function make(int $Electronic): Payments
    {
        return new static($Electronic);
    }

    public function setCash(?int $Cash): Payments
    {
        if ($Cash !== null) {
            Validator::validatePositiveNumber($Cash, 'Cash must be greater than 0');
        }

        $this->Cash = $Cash;
        return $this;
    }

    public function setElectronic(int $Electronic): Payments
    {
        Validator::validatePositiveNumber($Electronic, 'Electronic must be greater than 0');

        $this->Electronic = $Electronic;
        return $this;
    }

    public function setAdvancePayment(?int $AdvancePayment): Payments
    {
        if ($AdvancePayment !== null) {
            Validator::validatePositiveNumber($AdvancePayment, 'AdvancePayment must be greater than 0');
        }

        $this->AdvancePayment = $AdvancePayment;
        return $this;
    }

    public function setCredit(?int $Credit): Payments
    {
        if ($Credit !== null) {
            Validator::validatePositiveNumber($Credit, 'Credit must be greater than 0');
        }

        $this->Credit = $Credit;
        return $this;
    }

    public function setProvision(?int $Provision): Payments
    {
        if ($Provision !== null) {
            Validator::validatePositiveNumber($Provision, 'Provision must be greater than 0');
        }

        $this->Provision = $Provision;
        return $this;
    }
}