<?php

namespace GreenInvoice\Objects;

use GreenInvoice\Interfaces\Arrayable;

class PaymentRequestData extends ObjectAbstract implements Arrayable
{
    private array $plugins = [];
    private ?int $maxPayments = null;

    /**
     * @return PaymentPlugin[]
     */
    public function getPlugins(): array { return $this->plugins; }

    public function setPlugins(array $plugins): PaymentRequestData
    {
        $this->plugins = $plugins;
        return $this;
    }


    public function getMaxPayments(): ?int { return $this->maxPayments; }

    public function setMaxPayments(?int $maxPayments): PaymentRequestData
    {
        $this->maxPayments = $maxPayments;
        return $this;
    }

    public function toArray(): array
    {
        $array = [];

        if ($this->plugins) {
            $array['plugins'] = array_map(function (PaymentPlugin $plugin) {
                return $plugin->toArray();
            }, $this->getPlugins());
        }

        if ($this->maxPayments !== null) {
            $array['maxPayments'] = $this->getMaxPayments();
        };

        return $array;
    }
}