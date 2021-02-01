<?php

namespace GreenInvoice\Requests\Documents;

use GreenInvoice\Constants\ApiMethod;
use GreenInvoice\Constants\Currency;
use GreenInvoice\Constants\DocumentType;
use GreenInvoice\Constants\Lang;
use GreenInvoice\Constants\VatType;
use GreenInvoice\Objects\Client;
use GreenInvoice\Objects\Discount;
use GreenInvoice\Objects\Income;
use GreenInvoice\Objects\Payment;
use GreenInvoice\Objects\PaymentRequestData;
use GreenInvoice\Requests\RequestAbstract;

class AddDocument extends RequestAbstract
{
    protected string $api_method = ApiMethod::POST;
    protected string $api_endpoint = 'documents';

    private ?string $description = null;
    private ?string $remarks = null;
    private ?string $footer = null;
    private ?string $emailContent = null;
    private int $type;
    private ?string $date = null;
    private ?string $dueDate = null;
    private string $lang;
    private string $currency;
    private int $vatType;
    private ?Discount $discount = null;
    private bool $rounding = true;
    private bool $signed = true;
    private bool $attachment = true;
    private ?PaymentRequestData $paymentRequestData = null;
    private ?Client $client = null;
    private array $income = [];
    private array $payment = [];
    private array $linkedDocumentIds = [];
    private ?string $linkedPaymentId = null;
    private ?string $linkType = null;

    public function getDescription(): ?string { return $this->description; }

    /**
     * @param string|null $description Document's description
     *
     * @return AddDocument
     */
    public function setDescription(?string $description): AddDocument
    {
        $this->description = $description;
        return $this;
    }


    public function getRemarks(): ?string { return $this->remarks; }

    /**
     * @param string|null $remarks Document's remarks
     *
     * @return AddDocument
     */
    public function setRemarks(?string $remarks): AddDocument
    {
        $this->remarks = $remarks;
        return $this;
    }


    public function getFooter(): ?string { return $this->footer; }

    /**
     * @param string|null $footer Texts appearing in footer
     *
     * @return AddDocument
     */
    public function setFooter(?string $footer): AddDocument
    {
        $this->footer = $footer;
        return $this;
    }


    public function getEmailContent(): ?string { return $this->emailContent; }

    /**
     * @param string|null $emailContent Custom extra text appearing in email sent to customer
     *
     * @return AddDocument
     */
    public function setEmailContent(?string $emailContent): AddDocument
    {
        $this->emailContent = $emailContent;
        return $this;
    }


    public function getType(): int { return $this->type; }

    /**
     * @param int $type
     *
     * @return AddDocument
     * @see DocumentType
     */
    public function setType(int $type): AddDocument
    {
        $this->type = $type;
        return $this;
    }


    public function getDate(): ?string { return $this->date; }

    /**
     * @param \DateTime|string|null $date Document date in the format YYYY-MM-DD
     *
     * @return AddDocument
     */
    public function setDate($date): AddDocument
    {
        if ($date instanceof \DateTime) {
            $date = $date->format('Y-m-d');
        }

        $this->date = $date;
        return $this;
    }


    public function getDueDate(): ?string { return $this->dueDate; }

    /**
     * @param \DateTime|string|null $dueDate Document payment due date in the format YYYY-MM-DD
     *
     * @return AddDocument
     */
    public function setDueDate($dueDate): AddDocument
    {
        if ($dueDate instanceof \DateTime) {
            $dueDate = $dueDate->format('Y-m-d');
        }

        $this->dueDate = $dueDate;
        return $this;
    }


    public function getLang(): string { return $this->lang; }

    /**
     * @param string $lang
     *
     * @return AddDocument
     * @see Lang
     */
    public function setLang(string $lang): AddDocument
    {
        $this->lang = $lang;
        return $this;
    }


    public function getCurrency(): string { return $this->currency; }

    /**
     * @param string $currency
     *
     * @return AddDocument
     * @see Currency
     */
    public function setCurrency(string $currency): AddDocument
    {
        $this->currency = $currency;
        return $this;
    }


    public function getVatType(): int { return $this->vatType; }

    /**
     * @param int $vatType
     *
     * @return AddDocument
     * @see VatType
     */
    public function setVatType(int $vatType): AddDocument
    {
        $this->vatType = $vatType;
        return $this;
    }


    public function getDiscount(): ?Discount { return $this->discount; }

    /**
     * @param Discount|null $discount
     *
     * @return AddDocument
     */
    public function setDiscount(?Discount $discount): AddDocument
    {
        $this->discount = $discount;
        return $this;
    }


    public function isRounding(): bool { return $this->rounding; }

    /**
     * @param bool $rounding Round the amounts?
     *
     * @return AddDocument
     */
    public function setRounding(bool $rounding): AddDocument
    {
        $this->rounding = $rounding;
        return $this;
    }


    public function isSigned(): bool { return $this->signed; }

    /**
     * @param bool $signed Digital sign the document?
     *
     * @return AddDocument
     */
    public function setSigned(bool $signed): AddDocument
    {
        $this->signed = $signed;
        return $this;
    }


    public function isAttachment(): bool { return $this->attachment; }

    /**
     * @param bool $attachment Attach the document in the email sent to recipient?
     *
     * @return AddDocument
     */
    public function setAttachment(bool $attachment): AddDocument
    {
        $this->attachment = $attachment;
        return $this;
    }


    public function getPaymentRequestData(): ?PaymentRequestData { return $this->paymentRequestData; }

    /**
     * @param PaymentRequestData|null $paymentRequestData
     *
     * @return AddDocument
     */
    public function setPaymentRequestData(?PaymentRequestData $paymentRequestData): AddDocument
    {
        $this->paymentRequestData = $paymentRequestData;
        return $this;
    }


    public function getClient(): ?Client { return $this->client; }

    /**
     * @param Client|null $client
     *
     * @return AddDocument
     */
    public function setClient(?Client $client): AddDocument
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return Income[]
     */
    public function getIncome(): array { return $this->income; }

    public function addIncome(Income $income)
    {
        $this->income[] = $income;
    }

    /**
     * @param Income[] $income
     *
     * @return AddDocument
     */
    public function setIncome(array $income): AddDocument
    {
        foreach ($income as $item) {
            $this->addIncome($item);
        }

        return $this;
    }


    /**
     * @return Payment[]
     */
    public function getPayment(): array { return $this->payment; }

    public function addPayment(Payment $payment)
    {
        $this->payment[] = $payment;
    }

    /**
     * @param Payment[] $payment
     *
     * @return AddDocument
     */
    public function setPayment(array $payment): AddDocument
    {
        foreach ($payment as $item) {
            $this->addPayment($item);
        }

        return $this;
    }


    /**
     * @return string[]
     */
    public function getLinkedDocumentIds(): array { return $this->linkedDocumentIds; }

    /**
     * @param string[] $linkedDocumentIds
     *
     * @return AddDocument
     */
    public function setLinkedDocumentIds(array $linkedDocumentIds): AddDocument
    {
        return $this;
    }


    public function getLinkedPaymentId(): ?string { return $this->linkedPaymentId; }

    /**
     * @param string|null $linkedPaymentId
     *
     * @return AddDocument
     */
    public function setLinkedPaymentId(?string $linkedPaymentId): AddDocument
    {
        $this->linkedPaymentId = $linkedPaymentId;
        return $this;
    }


    public function getLinkType(): ?string { return $this->linkType; }

    /**
     * @param string|null $linkType
     *
     * @return AddDocument
     */
    public function setLinkType(?string $linkType): AddDocument
    {
        $this->linkType = $linkType;
        return $this;
    }
}