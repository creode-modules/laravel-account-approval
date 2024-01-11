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
            ->hasViews()
            ->hasMigration('create_laravel-account-approval_table')
            ->hasCommand(LaravelAccountApprovalCommand::class);
    }
}
