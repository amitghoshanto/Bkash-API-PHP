<?php

namespace App;


use App\Exceptions\PkBkashException;
use App\Model\Token;
use App\Model\Tokenized\Payment;
use App\Model\Tokenized\PaymentCreate;
use App\Model\Tokenized\PaymentQuery;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BkashTokenized extends BkashAbstract
{

    private string $auth;
    private string $callbackUrl;

    public function __construct(Client $client, string $username, string $password, $appKey, $appSecret, $callbackUrl, $currency)
    {
        $this->callbackUrl = $callbackUrl;

        if (empty($this->callbackUrl)) {
            throw new PkBkashException("Callback url is not provided");
        }

        parent::__construct($client, $username, $password, $appKey, $appSecret, $currency);
    }


    /**
     * @return Token|null
     * @throws GuzzleException
     */
    function getToken(): ?Token
    {

        $req = $this->client->request(
            'POST',
            'tokenized/checkout/token/grant',
            [
                'body' => json_encode([
                    'app_key' => $this->appKey,
                    'app_secret' => $this->appSecret
                ]),
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'username' => $this->username,
                    'password' => $this->password,
                ]
            ]
        );
        if ($req->getBody()){
            $token = new Token(json_decode($req->getBody(), true));
            $this->auth = $token->getToken();
            return $token;
        }
        return null;
    }


    /**
     * @param $invoice
     * @param $amount
     * @param $payerReference
     * @param string $intent
     * @return PaymentCreate|null
     * @throws GuzzleException
     */
    public function create($invoice, $amount, $payerReference, string $intent = 'sale'): ?PaymentCreate
    {
        $this->getToken();
        $req = $this->client->request(
            'POST',
            "tokenized/checkout/create",
            [
                'body' => json_encode([
                    'mode' => '0011',
                    'payerReference' => $payerReference,
                    'callbackURL' => $this->callbackUrl,
                    'amount' => $amount,
                    'currency' => $this->currency,
                    'intent' => $intent,
                    'merchantInvoiceNumber' => $invoice
                ]),
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $this->auth,
                    'X-App-Key' => $this->appKey,
                ]
            ]
        );
        if ($req->getBody()){
            return new PaymentCreate(json_decode($req->getBody(), true));
        }
        return null;

    }

    /**
     * @param string $paymentID
     * @return Payment|null
     * @throws GuzzleException
     */
    public function execute(string $paymentID): ?Payment
    {
        $this->getToken();
        $req = $this->client->request(
            'POST',
            "tokenized/checkout/execute",
            [
                'body' => json_encode([
                    'paymentID' => $paymentID,
                ]),
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $this->auth,
                    'X-App-Key' => $this->appKey,
                ]
            ]
        );
        if ($req->getBody()){
            return new PaymentTokenized(json_decode($req->getBody(), true));
        }
        return null;

    }

    /**
     * @param string $paymentID
     * @return PaymentQuery
     * @throws GuzzleException
     */
    public function query(string $paymentID): PaymentQuery|null
    {

        $this->getToken();
        $req = $this->client->request(
            'POST',
            "tokenized/checkout/payment/status",
            [
                'body' => json_encode([
                    'paymentID' => $paymentID,
                ]),
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $this->auth,
                    'X-App-Key' => $this->appKey,
                ]
            ]
        );
        if ($req->getBody()){
            return new PaymentQuery(json_decode($req->getBody(), true));
        }

        return null;

    }

}