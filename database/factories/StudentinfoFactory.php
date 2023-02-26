<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Studentinfo>
 */
class StudentinfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'middlename' => $this->faker->lastName(),
            'lastname' => $this->faker->lastName(),
            'birthdate' => $this->faker->date('Y-m-d'),
            'sex' => $this->faker->numberBetween(0, 1),
            'province' => $this->faker->address(),
            'town' => $this->faker->streetAddress(),
            'barrio' => $this->faker->streetName(),
            'guardian' => $this->faker->name(),
            'guardian_address' => $this->faker->address(),
            'guardian_occupation' => $this->faker->text(30),
            'elem_school' => $this->faker->text('30'),
            'elem_school_year' => $this->faker->year(),
            'elem_years' => $this->faker->numberBetween(1, 2),
            'gen_ave' => $this->faker->numberBetween(75, 99),
            'lrn' => $this->faker->numberBetween(100000000000, 999999999999)
        ];
    }
}
