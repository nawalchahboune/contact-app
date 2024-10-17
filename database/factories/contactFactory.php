<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class contactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           
            'first_name'=>fake()->name(),
            'last_name'=>fake()->name(),
            'phone'=>fake()->phoneNumber(),
            'adress'=>fake()->address(),
            'company_id'=>Company::pluck('id')->random(),
        ];
    }
}
