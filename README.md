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

## Migrations

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="account-approval-migrations"
php artisan migrate
```

## Configuration

You can publish the config file with:

```bash
php artisan vendor:publish --tag="account-approval-config"
```

Thie following options are available in the config file:

- `users_table` - The name of the users table in the database. Defaults to `users`.
- `redirect_route_name` - The name of the route to redirect to if the user is not approved. Defaults to `login`.

## Middleware

In order to prevent users from accessing the site until they have been approved, the `AccountActivated` middleware should be added to the `web` middleware group in `app/Http/Kernel.php`:

```php
protected $middlewareGroups = [
    'web' => [
        // ...
        \Creode\LaravelAccountApproval\Http\Middleware\AccountActivated::class,
    ],
    // ...
];
```

This middleware will run on every request, detect if the user is logged in and if they are not approved, redirect them to the `login` route. This route can be configured in the `config/account-approval.php` file.

## Extending Middleware

If you need to execute some custom functionality for the current website you can extend the `AccountActivated` middleware and override the `accountNotActivated` method. This will allow you to execute your custom functionality. The `unverifiedAccountRedirect` function can also be overridden to allow you to redirect to a custom route and set your own messaging/functionality.

```php
namespace App\Http\Middleware;

use Closure;
use Creode\LaravelAccountApproval\Http\Middleware\AccountActivated as BaseAccountActivated;

class AccountActivated extends BaseAccountActivated
{
    /**
     * Handle a failed activation.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Closure  $next
     *
     * @return mixed
     */
    protected function accountNotActivated(Request $request, Closure $next)
    {
        // Your custom functionality here
    }

    /**
     * Redirect which will happen if the user is not activated.
     *
     * Return null to continue with the request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return Response|null
     */
    protected function unverifiedAccountRedirect(Request $request, Closure $next): ?Response
    {
        // Your custom functionality here
    }
}
```

## Usage
Following package installation, running the migrations command will add an `activated` column to the users table. This defaults to `false` for all users. It is assumed this is the best configuration to get a site up and running quickly.

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
