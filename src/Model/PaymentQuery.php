<?php

namespace App\Model;

class PaymentQuery extends Payment
{


    /**
     * @return string|null
     */
    public function getRefundAmount(): ?string
    {
        return $this->data['refundAmount'] ?? null;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }

}