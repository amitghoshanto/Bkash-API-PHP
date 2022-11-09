# Bkash-API-PHP
Bkash Api system for php

Set Your credential in log.php file 
$bKash = Bkash::builder()
        ->setSandbox(false)
        ->setUsername('username')
        ->setPassword('password')
        ->setAppKey('appkey')
        ->setAppSecret('appsecret')
        ->build();
