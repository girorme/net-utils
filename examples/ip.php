<?php

require_once __DIR__ . "/../vendor/autoload.php";

try {
    // Range
    echo 'RANGE' . PHP_EOL;
    $range = NetUtils\Ip::range('192.168.0.1', '192.168.0.255');
    foreach ($range as $ip) {
        echo $ip . PHP_EOL;
    }

    // Cidr
    echo 'CIDR' . PHP_EOL;
    $range = NetUtils\Ip::cidr('192.168.0.1/24');
    foreach ($range as $ip) {
        echo $ip . PHP_EOL;
    }
} catch (\Exception $e) {
    exit('error:' . $e->getMessage());
}
