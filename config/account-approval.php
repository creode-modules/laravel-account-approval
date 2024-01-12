<?php

// config for Creode/LaravelAccountApproval
return [
    /*
    |--------------------------------------------------------------------------
    | Users Table
    |--------------------------------------------------------------------------
    |
    | This value is the name of the table which will be storing user accounts.
    | By default it uses the users table but you can change this to whatever
    | you want based on which User Model your application will be using for
    | authentication.
    |
    */

    'users_table' => 'users',

    /*
    |--------------------------------------------------------------------------
    | Account Not Verified Message
    |--------------------------------------------------------------------------
    |
    | This value is the message which is shown to the user when they try to
    | login but their account is not verified. By default it will show a
    | message which tells the user to check their email for the verification.
    |
    */

    'account_not_verified_message' => 'Your account is not verified. Please check your email for the verification link.',
];
