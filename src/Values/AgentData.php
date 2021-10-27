<?php

namespace Goldcarrot\Cashiers\Tinkoff\Values;

use Goldcarrot\Cashiers\Tinkoff\Enums\AgentSign;
use Goldcarrot\Cashiers\Tinkoff\Validators\Validator;

class AgentData extends Value
{
    /**
     * Признак агента.
     *
     * @see \Goldcarrot\Cashiers\Tinkoff\Enums\AgentSign
     *
     * @var string|null
     */
    protected ?string $AgentSign = null;

    /**
     * Наименование операции
     *
     * Обязательный, если AgentSign передан в значениях:
     * 1. bank_paying_agent
     * 2. bank_paying_subagent
     *
     * @var string|null
     */
    protected ?string $OperationName = null;

    /**
     * Телефоны платежного агента
     *
     * Обязательный, если AgentSign передан в значениях:
     * 1. bank_paying_agent
     * 2. bank_paying_subagent
     * 3. paying_agent
     * 4. paying_subagent
     *
     * @var array|null
     */
    protected ?array $Phones = null;

    /**
     * Телефоны оператора по приему платежей
     *
     * Обязательный, если AgentSign передан в значениях:
     * 1. paying_agent
     * 2. paying_subagent
     *
     * @var array|null
     */
    protected ?array $ReceiverPhones = null;

    /**
     * Телефоны оператора перевода
     *
     * Обязательный, если AgentSign передан в значениях:
     * 1. bank_paying_agent
     * 2. bank_paying_subagent
     *
     * @var array|null
     */
    protected ?array $TransferPhones = null;

    /**
     * Наименование оператора перевода
     *
     * Обязательный, если AgentSign передан в значениях:
     * 1. bank_paying_agent
     * 2. bank_paying_subagent
     *
     * @var array|null
     */
    protected ?array $OperatorName = null;

    /**
     * Адрес оператора перевода
     *
     * Обязательный, если AgentSign передан в значениях:
     * 1. bank_paying_agent
     * 2. bank_paying_subagent
     *
     * @var string|null
     */
    protected ?string $OperatorAddress = null;

    /**
     * ИНН оператора перевода
     *
     * Обязательный, если AgentSign передан в значениях:
     * 1. bank_paying_agent
     * 2. bank_paying_subagent
     *
     * @var string|null
     */
    protected ?string $OperatorInn = null;

    public static function make(): AgentData
    {
        return new static();
    }

    public function setAgentSign(?string $AgentSign): AgentData
    {
        if ($AgentSign) {
            Validator::validateEnum(AgentSign::class, $AgentSign, 'AgentSign has invalid value');
        }

        $this->AgentSign = $AgentSign;
        return $this;
    }

    public function setOperationName(?string $OperationName): AgentData
    {
        $this->OperationName = $OperationName;
        return $this;
    }

    public function setPhones(?array $Phones): AgentData
    {
        if ($Phones !== null) {
            Validator::validatePhones($Phones, 'Phones have invalid value');
        }

        $this->Phones = $Phones;
        return $this;
    }

    public function setReceiverPhones(?array $ReceiverPhones): AgentData
    {
        if ($ReceiverPhones !== null) {
            Validator::validatePhones($ReceiverPhones, 'ReceiverPhones have invalid value');
        }

        $this->ReceiverPhones = $ReceiverPhones;
        return $this;
    }

    public function setTransferPhones(?array $TransferPhones): AgentData
    {
        if ($TransferPhones !== null) {
            Validator::validatePhones($TransferPhones, 'TransferPhones have invalid value');
        }

        $this->TransferPhones = $TransferPhones;
        return $this;
    }

    public function setOperatorName(?array $OperatorName): AgentData
    {
        $this->OperatorName = $OperatorName;
        return $this;
    }

    public function setOperatorAddress(?string $OperatorAddress): AgentData
    {
        $this->OperatorAddress = $OperatorAddress;
        return $this;
    }

    public function setOperatorInn(?string $OperatorInn): AgentData
    {
        $this->OperatorInn = $OperatorInn;
        return $this;
    }
}