<?php

namespace App\Model\Tokenized;

class Payment
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
    public function getPayerReference(): ?string
    {
        return $this->data['payerReference'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getCustomerMsisdn(): ?string
    {
        return $this->data['customerMsisdn'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getTrxID(): ?string
    {
        return $this->data['trxID'] ?? null;
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
    public function getTransactionStatus(): ?string
    {
        return $this->data['transactionStatus'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getPaymentExecuteTime(): ?string
    {
        return $this->data['paymentExecuteTime'] ?? null;
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
    public function getIntent(): ?string
    {
        return $this->data['intent'] ?? null;
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