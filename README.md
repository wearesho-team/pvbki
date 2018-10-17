# PVBKI Integration

## Installation
```bash
composer require wearesho-team/pvbki
```

## Usage

Recommended to use container for dependency injections

### Configuration

Use custom [Config](./src/Config.php):

```php
<?php

use Wearesho\Pvbki;

$config = new Pvbki\Config(
    $username = 'username',
    $password = 'password',
    $accessPoint = 'access-point',
    $key = 'key',
    $mode = Pvbki\ConfigInterface::PRODUCTION_MODE, // or TEST_MODE
    $url = Pvbki\ConfigInterface::PRODUCTION_URL // or TEST_URL
);
```

Or [EnvironmentConfig](./src/EnvironmentConfig.php):

```php
<?php

use Wearesho\Pvbki;

$config = new Pvbki\EnvironmentConfig($prefix = 'PVBKI_');
```

Or use [ConfigInterface](./src/ConfigInterface.php) to implement your own config.

## License
[MIT](./LICENSE)
