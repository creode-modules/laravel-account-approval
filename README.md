# Laravel Account Approval

[![Latest Version on Packagist](https://img.shields.io/packagist/v/creode/laravel-account-approval.svg?style=flat-square)](https://packagist.org/packages/creode/laravel-account-approval)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/creode-modules/laravel-account-approval/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/creode-modules/laravel-account-approval/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/creode-modules/laravel-account-approval/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/creode-modules/laravel-account-approval/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/creode/laravel-account-approval.svg?style=flat-square)](https://packagist.org/packages/creode/laravel-account-approval)

A Laravel package which provides basic functionality for users to require account approval after registration.

## Installation

You can install the package via composer:

```bash
composer require creode/laravel-account-approval
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="account-approval-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="account-approval-config"
```

Thie following options are available in the config file:

- `users_table`: The name of the users table in the database. Defaults to `users`.

## Usage
Following package installation, running the migrations command will add a `requires_approval` column to the users table. This defaults to `false` for all users. It is assumed this is the best configuration to get a site up and running. This migration can be changed to set the default to `true` if required.

Alternatively, running the seeder provided in this module will set all existing users to be approved. This can be run with the following command:

```bash
php artisan db:seed --class="Creode\LaravelAccountApproval\Database\Seeders\AccountApprovalSeeder"
```

This will resolve the default authentication model and set the activated flag to `true` for all users.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Creode](https://github.com/creode-dev)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
