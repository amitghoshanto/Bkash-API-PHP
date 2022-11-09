Set Your credential in log.php file 
```php
$bKash = Bkash::builder()
        ->setSandbox(false) // True for Sandbox & False for Production
        ->setUsername('username')
        ->setPassword('password')
        ->setAppKey('appkey')
        ->setAppSecret('appsecret')
        ->build();
