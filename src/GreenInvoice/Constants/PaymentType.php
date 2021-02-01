<?php

namespace GreenInvoice\Constants;

class PaymentType
{
    /** @var int לא שולם */
    const NOT_PAID = -1;

    /** @var int ניכוי במקור */
    const DEDUCTION_AT_SOURCE = 0;

    /** @var int מזומן */
    const CASH = 1;

    /** @var int  המחאה */
    const CHECK = 2;

    /** @var int כרטיס אשראי */
    const CREDIT_CARD = 3;

    /** @var int העברה בנקאית */
    const BANK_TRANSFER = 4;

    /** @var int פייפאל */
    const PAYPAL = 5;

    /** @var int אפליקציית תשלום */
    const  PAYMENT_APP = 10;

    /** @var int אחר */
    const  OTHER = 11;
}