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
    | Redirect Route Name
    |--------------------------------------------------------------------------
    |
    | The name of the route to redirect to if the user is not activated. By
    | default this will be the login route but you can change this to whatever
    | you want.
    |
    */
    'redirect_route_name' => 'login',
];
