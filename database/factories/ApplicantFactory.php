<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'applicant_name' =>$this->faker->name(),
            'idnetity_number' =>$this->faker->nik(),
            'npwp' => $this->faker->randomDigit(12),
            'bpjs_kesehatan' => $this->faker->randomDigit(12),
            'birth_of' => $this->faker->city(),
            'birth_of_date' => $this->faker->date(),


        ];
    }
}
