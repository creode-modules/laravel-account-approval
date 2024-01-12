<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\TextUI\XmlConfiguration\MigrationException;

return new class extends Migration
{
    public function up()
    {
        $usersTable = config('account-approval.users_table', 'users');
        if (! Schema::hasTable($usersTable)) {
            throw new MigrationException("The '$usersTable' table does not exist.");
        }

        Schema::table(config('account-approval.users_table', 'users'), function (Blueprint $table) {
            $table->boolean('activated')->after('remember_token')->default(false);
        });
    }

    public function down()
    {
        $usersTable = config('account-approval.users_table', 'users');
        if (! Schema::hasTable($usersTable)) {
            throw new MigrationException("The '$usersTable' table does not exist.");
        }

        Schema::table(config('account-approval.users_table', 'users'), function (Blueprint $table) {
            $table->dropColumn('activated');
        });
    }
};
