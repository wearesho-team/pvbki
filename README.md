# PVBKI API integration PHP

## Installation

Use [composer](https://packagist.org) to install the package:

```bash
composer require wearesho-team/pvbki
```

## Usage

### Configuration

Use one of implemented configuration class:

- Custom:

```php
<?php

use Wearesho\Pvbki;

$config = new Pvbki\Config(
    'username',
    'password',
    'access-point',
    'key',
    $mode = Pvbki\ConfigInterface::PRODUCTION_MODE, // optional
    $url = Pvbki\ConfigInterface::PRODUCTION_URL // optional
);
```

- Environment:

```php
<?php

use Wearesho\Pvbki;

$config = new Pvbki\EnvironmentConfig('PVBKI_');
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

- Or you can implement your own configurations using [ConfigInterface](./src/ConfigInterface.php)

### Instantiate service

 - Create instance of service:

```php
<?php

use Wearesho\Pvbki;

/** @var Pvbki\ConfigInterface $config */

$service = new Pvbki\Service(
    $config,
    $client = new \GuzzleHttp\Client(), // or another client that implement \GuzzleHttp\ClientInterface
    $logger = new Psr\Log\NullLogger() // or another logger that implement \Psr\Log\LoggerInterface
);
```

### Import

- Use one of [identifications](./src/Identifications) entity:

```php
<?php

use Carbon\Carbon;
use Wearesho\Pvbki\Identifications;

// Use OKPO number, contains 8 digits
$identification = new Identifications\OkpoIdentification('12345678');

// Use DRFO number, contains 10 digits
$identification = new Identifications\DrfoIdentification('1234567890');

// Use passport's series code and number
// series must be in 2 cyrillic's chars length in uppercase in UTF-8 format
// number must be in 6 digits length
$identification = new Identifications\PassportIdentification('АБ', '123456');

// Use name, surname and birthdate of subject
// in request body will have format: NameSurnameDDMMYYY
$identification = new Identifications\ComplexIdentification('Name', 'Surname', Carbon::parse('2018-03-12'));
```

- Choose type of need report:

```php
<?php

use Wearesho\Pvbki;

$type = Pvbki\Statements\StatementType::BASE(); // base report
$type = Pvbki\Statements\StatementType::SCORING(); // base report + scoring 
```

- Compare identification and type into request statement:

```php
<?php

use Wearesho\Pvbki;

/** @var Pvbki\Identifications\SubjectIdentificationInterface $identification */
/** @var Pvbki\Statements\StatementType $type */

$statementRequest = new Pvbki\Statements\StatementRequest($identification, $type);

```

- And finally run import function:

```php
<?php

use Wearesho\Pvbki;

/** @var Pvbki\ServiceInterface $service */
/** @var Pvbki\Statements\StatementRequest $statementRequest */

$requestResponsePair = $service->import($statementRequest); // you will get aggregate request-response object

$request = (string)$requestResponsePair->getRequest()->getBody(); // get request body
$response = $requestResponsePair->getResponse()->getBody()->saveXML(); // get report body;
```

## Authors

- [Roman <KartaviK> Varkuta](mailto:roman.varkuta@gmail.com)

## License

Unlicensed
