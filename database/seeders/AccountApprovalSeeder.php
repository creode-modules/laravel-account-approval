<?php

namespace Creode\LaravelAccountApproval\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountApprovalSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authModel = Auth::getProvider()->getModel();

        $authModel::all()->each(function ($authUser) {
            $authUser->update(['activated' => true]);
        });
    }
}
