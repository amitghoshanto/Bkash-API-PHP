<?php

namespace App\Model\Tokenized;

class PaymentCreate
{


    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return string|null
     */
    public function getStatusCode(): ?string
    {
        return $this->data['statusCode'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getStatusMessage(): ?string
    {
        return $this->data['statusMessage'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getPaymentId(): ?string
    {
        return $this->data['paymentId'] ?? null;
    }



    /**
     * @return string|null
     */
    public function getBkashURL(): ?string
    {
        return $this->data['bkashURL'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getCallbackURL(): ?string
    {
        return $this->data['callbackURL'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getSuccessCallbackURL(): ?string
    {
        return $this->data['successCallbackURL'] ?? null;
    }    /**
     * @return string|null
     */
    public function getFailureCallbackURL(): ?string
    {
        return $this->data['failureCallbackURL'] ?? null;
    }    /**
     * @return string|null
     */
    public function getCancelledCallbackURL(): ?string
    {
        return $this->data['cancelledCallbackURL'] ?? null;
    }


    /**
     * @return string|null
     */
    public function getAmount(): ?string
    {
        return $this->data['amount'] ?? null;
    }


    /**
     * @return string|null
     */
    public function getIntent(): ?string
    {
        return $this->data['intent'] ?? null;
    }


    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->data['currency'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getPaymentCreateTime(): ?string
    {
        return $this->data['paymentCreateTime'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getTransactionStatus(): ?string
    {
        return $this->data['transactionStatus'] ?? null;
    }


    /**
     * @return string|null
     */
    public function getMerchantInvoiceNumber(): ?string
    {
        return $this->data['merchantInvoiceNumber'] ?? null;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }


}