<?php
namespace App;

use App\Exceptions\PkBkashException;

class BkashBuilder
{
    private const BASE_URL_SANDBOX = "https://checkout.sandbox.bka.sh/v1.2.0-beta/";
    private const BASE_URL = "https://checkout.pay.bka.sh/v1.2.0-beta/";

    private bool $sandbox = false;
    private string $currency = 'BDT';
    private string $username = '';
    private string $password = '';
    private string $appKey = '';
    private string $appSecret = '';
    private string $callbackUrl = '';



    function setSandbox(bool $sandbox): BkashBuilder
    {
        $this->sandbox = $sandbox;
        return $this;
    }

    function setCurrency(string $currency): BkashBuilder
    {
        $this->currency = $currency;
        return $this;

    }

    /**
     * @param string $username
     * @return BkashBuilder
     */
    public function setUsername(string $username): BkashBuilder
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param string $password
     * @return BkashBuilder
     */
    public function setPassword(string $password): BkashBuilder
    {
        $this->password = $password;
        return $this;

    }

    /**
     * @param string $appKey
     * @return BkashBuilder
     */
    public function setAppKey(string $appKey): BkashBuilder
    {
        $this->appKey = $appKey;
        return $this;

    }

    /**
     * @param string $appSecret
     * @return BkashBuilder
     */
    public function setAppSecret(string $appSecret): BkashBuilder
    {
        $this->appSecret = $appSecret;
        return $this;

    }

    /**
     * @param string $callbackUrl
     * @return BkashBuilder
     */
    public function setCallbackUrl(string $callbackUrl): BkashBuilder
    {
        $this->callbackUrl = $callbackUrl;
        return $this;
    }



    /**
     * @throws PkBkashException
     */
    function build(): Bkash
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => $this->sandbox ? self::BASE_URL_SANDBOX : self::BASE_URL
        ]);

        return new Bkash($client, $this->username, $this->password, $this->appKey, $this->appSecret, $this->currency);
    }

    /**
     * @throws PkBkashException
     */
    function buildTokenized(): BkashTokenized
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => $this->sandbox ? self::BASE_URL_SANDBOX : self::BASE_URL
        ]);

        return new BkashTokenized($client, $this->username, $this->password, $this->appKey, $this->appSecret, $this->callbackUrl, $this->currency);
    }



}