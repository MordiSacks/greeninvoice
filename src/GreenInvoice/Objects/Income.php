<?php

namespace GreenInvoice\Objects;

use GreenInvoice\Constants\Currency;
use GreenInvoice\Constants\VatType;
use GreenInvoice\Interfaces\Arrayable;

class Income extends ObjectAbstract implements Arrayable
{
    private ?string $catalogNum = null;
    private string $description;
    private int $quantity;
    private float $price;
    private string $currency;
    private ?float $currencyRate = null;
    private ?float $vatRate = null;
    private ?string $itemId = null;
    private int $vatType;

    public function getCatalogNum(): ?string { return $this->catalogNum; }

    /**
     * @param string|null $catalogNum Catalog number
     *
     * @return Income
     */
    public function setCatalogNum(?string $catalogNum): Income
    {
        $this->catalogNum = $catalogNum;
        return $this;
    }


    public function getDescription(): string { return $this->description; }

    /**
     * @param string $description Item description
     *
     * @return Income
     */
    public function setDescription(string $description): Income
    {
        $this->description = $description;
        return $this;
    }


    public function getQuantity(): int { return $this->quantity; }

    /**
     * @param int $quantity Quantity
     *
     * @return Income
     */
    public function setQuantity(int $quantity): Income
    {
        $this->quantity = $quantity;
        return $this;
    }


    public function getPrice(): float { return $this->price; }

    /**
     * @param float $price Item price
     *
     * @return Income
     */
    public function setPrice(float $price): Income
    {
        $this->price = $price;
        return $this;
    }


    public function getCurrency(): string { return $this->currency; }

    /**
     * @param string $currency
     *
     * @return Income
     * @see Currency
     */
    public function setCurrency(string $currency): Income
    {
        $this->currency = $currency;
        return $this;
    }


    public function getCurrencyRate(): ?float { return $this->currencyRate; }

    /**
     * @param float|null $currencyRate
     * Currency rate relative to ILS, If not set - decided by the rates of requested document date.
     *
     * @return Income
     */
    public function setCurrencyRate(?float $currencyRate): Income
    {
        $this->currencyRate = $currencyRate;
        return $this;
    }


    public function getVatRate(): ?float { return $this->vatRate; }

    /**
     * @param float|null $vatRate VAT rate of the item
     *
     * @return Income
     */
    public function setVatRate(?float $vatRate): Income
    {
        $this->vatRate = $vatRate;
        return $this;
    }


    public function getItemId(): ?string { return $this->itemId; }

    /**
     * @param string|null $itemId
     * The ID of the item to attach as income
     *
     * @return Income
     */
    public function setItemId(?string $itemId): Income
    {
        $this->itemId = $itemId;
        return $this;
    }


    public function getVatType(): int { return $this->vatType; }

    /**
     * @param int $vatType
     *
     * @return Income
     * @see VatType
     */
    public function setVatType(int $vatType): Income
    {
        $this->vatType = $vatType;
        return $this;
    }


    public function toArray(): array
    {
        return [
            'catalogNum'   => $this->getCatalogNum(),
            'description'  => $this->getDescription(),
            'quantity'     => $this->getQuantity(),
            'price'        => $this->getPrice(),
            'currency'     => $this->getCurrency(),
            'currencyRate' => $this->getCurrencyRate(),
            'vatRate'      => $this->getVatRate(),
            'itemId'       => $this->getItemId(),
            'vatType'      => $this->getVatType(),
        ];
    }
}