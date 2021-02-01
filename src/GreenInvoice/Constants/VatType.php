<?php

namespace GreenInvoice\Constants;

class VatType
{
    /** @var int Based on business type */
    const DEFAULT = 0;

    /** @var int VAT FREE */
    const EXEMPT = 1;

    /** @var int Contains exempt and due VAT income rows */
    const MIXED = 2;
}