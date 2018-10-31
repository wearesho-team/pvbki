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

### Service instance

To instantiate service you need config, that implement [ConfigInterface](src/Interrelations/ConfigInterface.php), 
client, that implement [GuzzleHttp/ClientInterface](http://docs.guzzlephp.org/en/stable).

```php
<?php

use Psr\Log;
use GuzzleHttp;
use Wearesho\Pvbki;

$config = new Pvbki\EnvironmentConfig('PVBKI_');
$client = new GuzzleHttp\Client();

$service = new Pvbki\Service($config, $client);
```

Use [ServiceInterface](./src/Interrelations/ServiceInterface.php) to customize it;

### Import method

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

#### Statement request type

Use one of two statement types:

```php
<?php

use Wearesho\Pvbki\Enums\StatementType;

// Use constructor
$type = new StatementType(StatementType::BASE);
$type = new StatementType(StatementType::SCORING);

// Use MyCLabs\Enum\Enum implementation
$type = StatementType::BASE();
$type = StatementType::SCORING();
```

#### Run import method

Combine `SubjectInterface` and `StatementType` into `StatementRequest` and run `import(...)` method.

You will get [RequestResponsePair](./src/RequestResponsePair.php) object, 
that contains bodies of request and response in `string` format.

```php
<?php

use Wearesho\Pvbki;

/** @var Pvbki\Interrelations\SubjectInterface $identification*/
/** @var Pvbki\Enums\StatementType $type */
/** @var Pvbki\Interrelations\ServiceInterface $service */

$request = new Pvbki\StatementRequest($identification, $type);

$requestResponsePair = $service->import($request);

$requestBody = $requestResponsePair->getRequestBody();
$responseBody = $requestResponsePair->getResponseBody();
```

### Parser

You can parse existed report to get beautiful objects.

```php
<?php

use Wearesho\Pvbki;

/** @var string $report */

$reportObj = (new Pvbki\Parser())->parse($report);

// It is jsonSerializable
$serialized = json_encode($reportObj);
```

You can see [example](./data/response/example.json) of generated json.

## License
[MIT](./LICENSE)
