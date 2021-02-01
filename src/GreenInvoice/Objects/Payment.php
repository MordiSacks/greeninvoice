<?php

namespace GreenInvoice\Objects;

use GreenInvoice\Constants\Currency;
use GreenInvoice\Constants\PaymentAppType;
use GreenInvoice\Constants\PaymentCardType;
use GreenInvoice\Constants\PaymentDealType;
use GreenInvoice\Constants\PaymentSubType;
use GreenInvoice\Constants\PaymentType;
use GreenInvoice\Interfaces\Arrayable;

class Payment extends ObjectAbstract implements Arrayable
{
    private string $date;
    private int $type;
    private float $price;
    private string $currency;
    private ?float $currencyRate = null;
    private ?string $bankName = null;
    private ?string $bankBranch = null;
    private ?string $bankAccount = null;
    private ?string $chequeNum = null;
    private ?string $accountId = null;
    private ?string $transactionId = null;
    private ?string $appType = null;
    private ?string $subType = null;
    private ?int $cardType = null;
    private ?string $cardNum = null;
    private ?int $dealType = null;
    private ?int $numPayments = null;
    private ?int $firstPayment = null;

    public function getDate(): string { return $this->date; }

    /**
     * @param \DateTime|string $date
     * Payment date in the format YYYY-MM-DD
     *
     * @return Payment
     */
    public function setDate($date): Payment
    {
        if ($date instanceof \DateTime) {
            $date = $date->format('Y-m-d');
        }

        $this->date = $date;
        return $this;
    }


    public function getType(): int { return $this->type; }

    /**
     * @param int $type
     *
     * @return Payment
     * @see PaymentType
     */
    public function setType(int $type): Payment
    {
        $this->type = $type;
        return $this;
    }


    public function getPrice(): float { return $this->price; }

    /**
     * @param float $price
     * Item price
     *
     * @return Payment
     */
    public function setPrice(float $price): Payment
    {
        $this->price = $price;
        return $this;
    }


    public function getCurrency(): string { return $this->currency; }

    /**
     * @param string $currency
     *
     * @return Payment
     * @see Currency
     */
    public function setCurrency(string $currency): Payment
    {
        $this->currency = $currency;
        return $this;
    }


    public function getCurrencyRate(): ?float { return $this->currencyRate; }

    /**
     * @param float|null $currencyRate
     * Currency rate relative to ILS, If not set - decided by the rates of requested payment date.
     *
     * @return Payment
     */
    public function setCurrencyRate(?float $currencyRate): Payment
    {
        $this->currencyRate = $currencyRate;
        return $this;
    }


    public function getBankName(): ?string { return $this->bankName; }

    /**
     * @param string|null $bankName
     * Bank name (required when using Cheques)
     *
     * @return Payment
     */
    public function setBankName(?string $bankName): Payment
    {
        $this->bankName = $bankName;
        return $this;
    }


    public function getBankBranch(): ?string { return $this->bankBranch; }

    /**
     * @param string|null $bankBranch
     * Bank branch (required when using Cheques)
     *
     * @return Payment
     */
    public function setBankBranch(?string $bankBranch): Payment
    {
        $this->bankBranch = $bankBranch;
        return $this;
    }


    public function getBankAccount(): ?string { return $this->bankAccount; }

    /**
     * @param string|null $bankAccount
     * Bank account (required when using Cheques)
     *
     * @return Payment
     */
    public function setBankAccount(?string $bankAccount): Payment
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }


    public function getChequeNum(): ?string { return $this->chequeNum; }

    /**
     * @param string|null $chequeNum
     * Cheque number (required when using Cheques)
     *
     * @return Payment
     */
    public function setChequeNum(?string $chequeNum): Payment
    {
        $this->chequeNum = $chequeNum;
        return $this;
    }


    public function getAccountId(): ?string { return $this->accountId; }

    /**
     * @param string|null $accountId
     * Payer account (PayPal / Payment App / Other)
     *
     * @return Payment
     */
    public function setAccountId(?string $accountId): Payment
    {
        $this->accountId = $accountId;
        return $this;
    }


    public function getTransactionId(): ?string { return $this->transactionId; }

    /**
     * @param string|null $transactionId
     * transaction ID (PayPal / Payment App / Other)
     *
     * @return Payment
     */
    public function setTransactionId(?string $transactionId): Payment
    {
        $this->transactionId = $transactionId;
        return $this;
    }


    public function getAppType(): ?string { return $this->appType; }

    /**
     * @param string|null $appType
     *
     * @return Payment
     * @see PaymentAppType
     */
    public function setAppType(?string $appType): Payment
    {
        $this->appType = $appType;
        return $this;
    }


    public function getSubType(): ?string { return $this->subType; }

    /**
     * @param string|null $subType
     *
     * @return Payment
     * @see PaymentSubType
     */
    public function setSubType(?string $subType): Payment
    {
        $this->subType = $subType;
        return $this;
    }


    public function getCardType(): ?int { return $this->cardType; }

    /**
     * @param int|null $cardType
     *
     * @return Payment
     * @see PaymentCardType
     */
    public function setCardType(?int $cardType): Payment
    {
        $this->cardType = $cardType;
        return $this;
    }


    public function getCardNum(): ?string { return $this->cardNum; }

    /**
     * @param string|null $cardNum
     * Credit card's last 4 digits
     *
     * @return Payment
     */
    public function setCardNum(?string $cardNum): Payment
    {
        $this->cardNum = $cardNum;
        return $this;
    }


    public function getDealType(): ?int { return $this->dealType; }

    /**
     * @param int|null $dealType
     *
     * @return Payment
     * @see PaymentDealType
     */
    public function setDealType(?int $dealType): Payment
    {
        $this->dealType = $dealType;
        return $this;
    }


    public function getNumPayments(): ?int { return $this->numPayments; }

    /**
     * @param int|null $numPayments
     * Credit card's payments count (1-36)
     *
     * @return Payment
     */
    public function setNumPayments(?int $numPayments): Payment
    {
        $this->numPayments = $numPayments;
        return $this;
    }


    public function getFirstPayment(): ?int { return $this->firstPayment; }

    /**
     * @param int|null $firstPayment
     * Credit card's first payment
     *
     * @return Payment
     */
    public function setFirstPayment(?int $firstPayment): Payment
    {
        $this->firstPayment = $firstPayment;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'date'          => $this->getDate(),
            'type'          => $this->getType(),
            'price'         => $this->getPrice(),
            'currency'      => $this->getCurrency(),
            'currencyRate'  => $this->getCurrencyRate(),
            'bankName'      => $this->getBankName(),
            'bankBranch'    => $this->getBankBranch(),
            'bankAccount'   => $this->getBankAccount(),
            'chequeNum'     => $this->getChequeNum(),
            'accountId'     => $this->getAccountId(),
            'transactionId' => $this->getTransactionId(),
            'appType'       => $this->getAppType(),
            'subType'       => $this->getSubType(),
            'cardType'      => $this->getCardType(),
            'cardNum'       => $this->getCardNum(),
            'dealType'      => $this->getDealType(),
            'numPayments'   => $this->getNumPayments(),
            'firstPayment'  => $this->getFirstPayment(),
        ];
    }
}