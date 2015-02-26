# demander

[![Latest Version](https://img.shields.io/github/release/NigelGreenway/Demander.svg?style=flat-square)](https://github.com/NigelGreenway/Demander/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/NigelGreenway/Demander/master.svg?style=flat-square)](https://travis-ci.org/NigelGreenway/Demander)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
$ composer require league/demander
```

## Usage

Below is a very basic example on how to use the package. More docs will be released when version 1.0 is released in the next week or two.

``` php

$mapping = [
    'GetActiveEmployeesQuery' => 'GetActiveEmployeesQueryHandler',
];

$mediator = new NigelGreenway\Demander($mapping);

$activeEmployees = $mediator->request(new GetEmployeesByStatusQuery('active'));

foreach($activeEmployees as $activeEmployee) {
    echo $activeEmployee->fullName;
}


```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email nigel_greenway@me.com instead of using the issue tracker.

## Credits

- [Nigel Greenway](https://github.com/NigelGreenway)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.