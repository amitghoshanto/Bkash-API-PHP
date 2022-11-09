<?php

use App\Bkash;

require_once 'vendor/autoload.php';

$json = ['error' => true, 'data' => null];

try {

    $bKash = Bkash::builder()
        ->setSandbox(false)
        ->setUsername('username')
        ->setPassword('password')
        ->setAppKey('appkey')
        ->setAppSecret('appsecret')
        ->build();


    switch (@$_GET['action']) {
        case 'create': {
            $amount = $_GET['amount'] ?? '120.40';
            $resp = $bKash->create(uniqid('INV'), $amount);

            if (!$resp->getErrorCode()) {
                $json['error'] = false;
            }

                $json['data'] = $resp->toArray();

            break;
        }
        case 'execute': {
            $payId = $_GET['paymentID'] ?? '';

            $resp = $bKash->execute($payId);

            if (!$resp->getErrorCode()) {
                $json['error'] = false;
            }

            $json['data'] = $resp->toArray();

            break;
        }
        default: {
            $json['data'] = 'Unknown action';
        }
    };


} catch (\Exception $e) {
    var_dump($e->getMessage());
}



echo json_encode($json);


