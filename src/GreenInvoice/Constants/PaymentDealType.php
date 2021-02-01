<?php

namespace GreenInvoice\Constants;

class PaymentDealType
{
    /** @var int רגיל */
    const REGULAR = 1;

    /** @var int תשלומים */
    const PAYMENTS = 2;

    /** @var int קרדיט */
    const CREDIT = 3;

    /** @var int חיוב נדחה */
    const REJECTED = 4;

    /** @var int אחר */
    const OTHER = 5;
}