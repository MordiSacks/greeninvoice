<?php

namespace GreenInvoice\Objects;

use GreenInvoice\Constants\PaymentPluginGroup;
use GreenInvoice\Constants\PaymentPluginType;
use GreenInvoice\Interfaces\Arrayable;

class PaymentPlugin extends ObjectAbstract implements Arrayable
{
    private string $id;
    private string $group;
    private string $type;

    public function getId(): string { return $this->id; }

    /**
     * @param string $id The plugin ID
     *
     * @return PaymentPlugin
     */
    public function setId(string $id): PaymentPlugin
    {
        $this->id = $id;
        return $this;
    }


    public function getGroup(): string { return $this->group; }

    /**
     * @param string $group The payment group
     *
     * @return PaymentPlugin
     * @see PaymentPluginGroup
     */
    public function setGroup(string $group): PaymentPlugin
    {
        $this->group = $group;
        return $this;
    }


    public function getType(): string { return $this->type; }

    /**
     * @param string $type The payment plugin type
     *
     * @return PaymentPlugin
     * @see PaymentPluginType
     */
    public function setType(string $type): PaymentPlugin
    {
        $this->type = $type;
        return $this;
    }


    public function toArray(): array
    {
        return [
            'id'    => $this->getId(),
            'group' => $this->getGroup(),
            'type'  => $this->getType(),
        ];
    }
}