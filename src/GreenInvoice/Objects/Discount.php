<?php

namespace GreenInvoice\Objects;

use GreenInvoice\Interfaces\Arrayable;

class Discount extends ObjectAbstract implements Arrayable
{
    private int $amount;
    private string $type;

    /**
     * Discount constructor.
     *
     * @param int    $amount
     * @param string $type
     */
    public function __construct(int $amount, string $type)
    {
        $this->amount = $amount;
        $this->type = $type;
    }


    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'type'   => $this->type,
        ];
    }
}