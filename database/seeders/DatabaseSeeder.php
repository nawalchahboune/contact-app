<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Company::factory(10)->create();
        // Contact::factory(20)->create();
       // Company::factory(10)->has(Contact::factory(20))->create();
        User::factory(10)->has(
            Company::factory(10)->has(
                Contact::factory(10)
                ->state(function (array $attributes,Company $company) {
                    return ['user_id' => $company->user_id];
                }) 
            )
            )->create();
    }
}