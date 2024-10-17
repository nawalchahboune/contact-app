<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
    // {
    //     $faker=Faker::create();
    //     $contacts=[];
    //     foreach(range(1,10) as $i) {
    //         $companies=Company::all();
    //         foreach($companies as $company) {
            
    //         $contact=[
    //             'first_name'=>$faker->name(),
    //             'last_name'=>$faker->name(),
    //             'phone'=>$faker->phoneNumber(),
    //             'adress'=>$faker->address(),
    //             'company_id'=>$company->id,
    //             'created_at'=>now(),
    //             'updated_at'=>now(),
            
            
    //     ];
    //     $contacts[] = $contact;
    // }
        
    //     }
    //     DB::table('contacts')->insert($contacts);
    // }

    Contact::factory()->count(20)->create();
    }
}