<?php

namespace App;


use App\Exceptions\PkBkashException;
use App\Model\Payment;
use App\Model\PaymentCreate;
use App\Model\PaymentQuery;
use App\Model\Token;
use GuzzleHttp\Exception\GuzzleException;

class Bkash extends BkashAbstract
{

    private string $auth;

    /**
     * @return Token|null
     * @throws GuzzleException
     * @throws PkBkashException
     */
    function getToken(): ?Token
    {

        $req = $this->client->request(
            'POST',
            'checkout/token/grant',
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
     * @param string $intent
     * @return PaymentCreate|null
     * @throws GuzzleException
     * @throws PkBkashException
     */
    public function create($invoice, $amount, string $intent = 'sale'): ?PaymentCreate
    {
        $this->getToken();
        $req = $this->client->request(
            'POST',
            "checkout/payment/create",
            [
                'body' => json_encode([
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
     * @throws PkBkashException
     */
    public function execute(string $paymentID): ?Payment
    {
        $this->getToken();
        $req = $this->client->request(
            'POST',
            "checkout/payment/execute/$paymentID",
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $this->auth,
                    'X-App-Key' => $this->appKey,
                ]
            ]
        );
        if ($req->getBody()){
            return new Payment(json_decode($req->getBody(), true));
        }
        return null;

    }

    /**
     * @param string $paymentID
     * @return PaymentQuery|null
     * @throws GuzzleException
     * @throws PkBkashException
     */
    public function query(string $paymentID): ?PaymentQuery
    {

        $this->getToken();
        $req = $this->client->request(
            'GET',
            "checkout/payment/query/$paymentID",
            [
                'headers' => [
                    'Accept' => 'application/json',
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