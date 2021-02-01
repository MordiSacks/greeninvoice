<?php

use GreenInvoice\Api;
use GreenInvoice\Constants\Currency;
use GreenInvoice\Constants\DiscountType;
use GreenInvoice\Constants\DocumentType;
use GreenInvoice\Constants\IncomeVatType;
use GreenInvoice\Constants\Lang as GiLang;
use GreenInvoice\Constants\PaymentCardType;
use GreenInvoice\Constants\PaymentDealType;
use GreenInvoice\Constants\PaymentPluginGroup;
use GreenInvoice\Constants\PaymentPluginType;
use GreenInvoice\Constants\PaymentType;
use GreenInvoice\Constants\VatType;
use GreenInvoice\Objects\Client;
use GreenInvoice\Objects\Discount;
use GreenInvoice\Objects\Income;
use GreenInvoice\Objects\Payment;
use GreenInvoice\Objects\PaymentPlugin;
use GreenInvoice\Objects\PaymentRequestData;

date_default_timezone_set('Asia/Jerusalem');

require __DIR__ . '/../vendor/autoload.php';

// Copy config.example.php to config.php and set you configuration
$config = require __DIR__ . '/config.php';

$gi = new Api($config['url'], $config['api_key'], $config['api_secret']);

$request = $gi->documents
    ->addDocument()
    ->setDescription('This my description')
    ->setRemarks('My Remarks')
    ->setFooter('This is my foot')
    ->setEmailContent('Sample email content')
    ->setEmailContent('Sample email content')
    ->setType(DocumentType::TAX_INVOICE_RECEIPT)
    ->setDate(new DateTime())
    ->setDueDate(new DateTime())
    ->setLang(GiLang::HEBREW)
    ->setCurrency(Currency::ILS)
    ->setVatType(VatType::DEFAULT)
    //->setDiscount(new Discount(1, DiscountType::PERCENTAGE))
    ->setRounding(false)
    ->setSigned(true)
    ->setAttachment(true)
    /*
    ->setPaymentRequestData((new PaymentRequestData())
        ->setMaxPayments(1)
        ->setPlugins([
            (new PaymentPlugin())
                ->setId('id111')
                ->setType(PaymentPluginType::MAX)
                ->setGroup(PaymentPluginGroup::CREDIT_CARD),
        ])
    )
    */
    ->setClient((new Client())
        ->setName('John Doe')
        ->setTaxId('123456789')
        ->setEmails(['sample@example.com'])
    )
    ->setIncome([
        (new Income())
            ->setDescription('Property Estimate Campaign')
            ->setQuantity(1)
            ->setPrice(1.55)
            ->setCurrency(Currency::ILS)
            ->setCurrencyRate(1)
            //->setVatRate(0.17)
            ->setVatType(IncomeVatType::INCLUDED)
        ,
    ])
    ->setPayment([
        (new Payment())
            ->setDate(new DateTime())
            ->setType(PaymentType::CASH)
            ->setPrice(1.55)
            ->setCurrency(Currency::ILS)
            ->setCurrencyRate(1)
        //->setAccountId('ai-4545421')
        //->setTransactionId('xz-123456789')
        //->setCardType(PaymentCardType::MASTERCARD)
        //->setCardNum('1234')
        //->setDealType(PaymentDealType::REGULAR)
        ,

    ])
    //->setLinkedDocumentIds()
    //->setLinkedPaymentId()
    //->setLinkType()
;

$response = $request->execute();

dd($response, 'yes');
