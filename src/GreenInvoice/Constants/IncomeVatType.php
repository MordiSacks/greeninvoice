<?php

namespace GreenInvoice\Constants;

class IncomeVatType
{
    /** @var int VAT will be added based on the business type */
    const DEFAULT = 0;

    /** @var int VAT included in the price */
    const INCLUDED = 1;

    /** @var int VAT free */
    const EXEMPT = 2;
}