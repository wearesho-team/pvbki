# PVBKI Integration
[![Build Status](https://travis-ci.org/wearesho-team/pvbki.svg?branch=master)](https://travis-ci.org/wearesho-team/pvbki)
[![codecov](https://codecov.io/gh/wearesho-team/pvbki/branch/master/graph/badge.svg)](https://codecov.io/gh/wearesho-team/pvbki)

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
    $mode = Pvbki\Interrelations\ConfigInterface::PRODUCTION_MODE, // or TEST_MODE
    $url = Pvbki\Interrelations\ConfigInterface::PRODUCTION_URL // or TEST_URL
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

- Or use [ConfigInterface](src/Interrelations/ConfigInterface.php) to implement your own config.

### Import

#### Identification subject

Use one of implemented subject's identifications:

```php
<?php

use Wearesho\Pvbki;

// Subject's passport series and number
// series must be in 2 chars length, uppercase and UTF-8 format
// number must be in 6 digits length
$passport = new Pvbki\Identifications\Passport('АБ', '123456');

// Subject's DRFO number
// contains 10 digits
$drfo = new Pvbki\Identifications\Drfo('1234567890');

// Subject's OKPO number
// contains 8 digits
$okpo = new Pvbki\Identifications\Okpo('12345678');

// Subject's name, surname and birthdate of subject
// in request body will have format: NameSurnameDDMMYYY
$complex = new Pvbki\Identifications\Complex('Name', 'Surname', new DateTime('2018-03-12'));
```

All identifications implement [SubjectInterface](./src/Interrelations/SubjectInterface.php). 
Use it if you want to customize identification object.

## License
[MIT](./LICENSE)
