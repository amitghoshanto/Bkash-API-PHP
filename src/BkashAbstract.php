<?php
namespace App;

use App\Exceptions\PkBkashException;
use GuzzleHttp\Client;

abstract class BkashAbstract {


    protected Client $client;
    protected string $username;
    protected string $password;
    protected string $appKey;
    protected string $appSecret;
    protected string $currency;

    /**
     * @param Client $client
     * @param string $username
     * @param string $password
     * @param $appKey
     * @param $appSecret
     * @param $currency
     * @throws PkBkashException
     */
    public function __construct(Client $client, string $username, string $password, $appKey, $appSecret, $currency)
    {
        $this->client = $client;
        $this->username = $username;
        $this->password = $password;
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
        $this->currency = $currency;


        if (empty($this->username) || empty($this->password)){
            throw new PkBkashException("Username or Password is not provided");
        }
        if (empty($this->appKey)){
            throw new PkBkashException("App Key is not provided");
        }
        if (empty($this->appSecret)){
            throw new PkBkashException("App Secret is not provided");
        }
    }


    public static function builder(): BkashBuilder
    {
        return new BkashBuilder();
    }
}
