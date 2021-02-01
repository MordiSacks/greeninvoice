<?php

namespace GreenInvoice\Constants;

class DocumentType
{
    /** @var int הצעת מחיר */
    const _10 = 10;
    /** @var int הצעת מחיר */
    const BID = self::_10;

    /** @var int הזמנה */
    const _100 = 100;
    /** @var int הזמנה */
    const ORDER = self::_100;

    /** @var int תעודת משלוח */
    const _200 = 200;
    /** @var int תעודת משלוח */
    const SHIPPING_CERTIFICATE = self::_200;

    /** @var int תעודת החזרה */
    const _210 = 210;
    /** @var int תעודת החזרה */
    const RETURN_CERTIFICATE = self::_210;

    /** @var int חשבון עסקה */
    const _300 = 300;
    /** @var int חשבון עסקה */
    const TRANSACTION_ACCOUNT = self::_300;

    /** @var int חשבונית מס */
    const _305 = 305;
    /** @var int חשבונית מס */
    const INVOICE = self::_305;

    /** @var int חשבונית מס / קבלה */
    const _320 = 320;
    /** @var int חשבונית מס / קבלה */
    const TAX_INVOICE_RECEIPT = self::_320;

    /** @var int חשבונית זיכוי */
    const _330 = 330;
    /** @var int חשבונית זיכוי */
    const CREDIT_INVOICE = self::_330;

    /** @var int קבלה */
    const _400 = 400;
    /** @var int קבלה */
    const RECEIPT = self::_400;

    /** @var int קבלה על תרומה */
    const _405 = 405;
    /** @var int קבלה על תרומה */
    const DONATION_RECEIPT = self::_405;

    /** @var int הזמנת רכש */
    const _500 = 500;
    /** @var int הזמנת רכש */
    const PURCHASE_ORDER = self::_500;

    /** @var int קבלת פיקדון */
    const _600 = 600;
    /** @var int קבלת פיקדון */
    const DEPOSIT_RECEIPT = self::_600;

    /** @var int משיכת פיקדון */
    const _610 = 610;
    /** @var int משיכת פיקדון */
    const DEPOSIT_WITHDRAWAL = self::_610;
}