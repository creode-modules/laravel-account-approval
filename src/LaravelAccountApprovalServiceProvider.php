<?php

namespace Creode\LaravelAccountApproval;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Creode\LaravelAccountApproval\Commands\LaravelAccountApprovalCommand;

class LaravelAccountApprovalServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-account-approval')
            ->hasConfigFile()
            ->hasMigration('add_activated_field_to_users_table')
            ->runsMigrations();
    }
}
