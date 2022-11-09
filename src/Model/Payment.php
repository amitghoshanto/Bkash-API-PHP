<?php

namespace App\Model;

class Payment
{


    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }


    /**
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->data['errorCode'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->data['errorMessage'] ?? null;
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
    public function getCreateTime(): ?string
    {
        return $this->data['createTime'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getUpdateTime(): ?string
    {
        return $this->data['updateTime'] ?? null;
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
    public function getTransactionStatus(): ?string
    {
        return $this->data['transactionStatus'] ?? null;
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