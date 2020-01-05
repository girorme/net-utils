# net-utils
A serie of network util functions


## Install
```
$ git clone https://github.com/girorme/net-utils
$ cd net-utils
$ composer install
```

## Usage

### NetUtils\Ip class

> The range functions actually generates the ips using [generator](https://www.php.net/manual/en/class.generator) to avoid extensive memory usage and memory limit, so the result of `Ip::range`, `Ip::cidr` for example need to be iterated

#### Generate range
```php
require_once __DIR__ . '/vendor/autoload.php';

try {
    $range = NetUtils\Ip::range('192.168.0.1', '192.168.0.255');
    foreach ($range as $ip) {
        echo $ip . PHP_EOL;
    }
} catch (\Exception $e) {
    // catch
}

```

#### Generate range via cidr
```php
require_once __DIR__ . '/vendor/autoload.php';

try {
    $range = NetUtils\Ip::cidr('192.168.0.1/24');
    foreach ($range as $ip) {
        echo $ip . PHP_EOL;
    }
} catch (\Exception $e) {
    // catch
}
```

For examples check the `examples` folder
