# PVBKI Integration

## Installation
```bash
composer require wearesho-team/pvbki
```

## Usage

Recommended to use container for dependency injections

### Configuration
Use one of implemented configurations:

- Custom [Config](./src/Config.php):

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

- [EnvironmentConfig](./src/EnvironmentConfig.php):

```php
<?php

use Wearesho\Pvbki;

$config = new Pvbki\EnvironmentConfig($prefix = 'PVBKI_');
```

Environment variables:

|      variable      | required |                              default value                              |                      description                     |
|:------------------:|:--------:|:-----------------------------------------------------------------------:|:----------------------------------------------------:|
| PVBKI_USERNAME     | yes      |                                                                         | Your service login                                   |
| PVBKI_PASSWORD     | yes      |                                                                         | Your service password                                |
| PVBKI_ACCESS_POINT | yes      |                                                                         | The name of the client's access point to the service |
| PVBKI_KEY          | yes      |                                                                         | Client access key to the service                     |
| PVBKI_URL          | no       | [Production url](https://secure.pvbki.com/reverse-service/default.asmx) | Url for service requests                             |
| PVBKI_MODE         | no       | 1                                                                       | Test or production mode (0...1)                      |

Example environment file content:

```dotenv
PVBKI_USERNAME=
PVBKI_PASSWORD=
PVBKI_ACCESS_POINT=
PVBKI_KEY=
PVBKI_URL=
PVBKI_MODE=
```

- Or use [ConfigInterface](./src/ConfigInterface.php) to implement your own config.

## License
[MIT](./LICENSE)
