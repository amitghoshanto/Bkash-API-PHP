<?php

namespace App\Model\Tokenized;

class PaymentQuery
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
    public function getMode(): ?string
    {
        return $this->data['mode'] ?? null;
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
    public function getMerchantInvoice(): ?string
    {
        return $this->data['merchantInvoice'] ?? null;
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
    public function getVerificationStatus(): ?string
    {
        return $this->data['verificationStatus'] ?? null;
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
    public function getAgreementStatus(): ?string
    {
        return $this->data['agreementStatus'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getAgreementCreateTime(): ?string
    {
        return $this->data['agreementCreateTime'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getAgreementExecuteTime(): ?string
    {
        return $this->data['agreementExecuteTime'] ?? null;
    }


    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }



}