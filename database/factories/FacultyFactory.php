<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faculty>
 */
class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faculties = [
            ['name' => 'Faculty of Engineering', 'code' => 'FT'],
            ['name' => 'Faculty of Computer Science', 'code' => 'FKOM'],
            ['name' => 'Faculty of Business Administration', 'code' => 'FBA'],
            ['name' => 'Faculty of Medicine', 'code' => 'FK'],
            ['name' => 'Faculty of Law', 'code' => 'FH'],
            ['name' => 'Faculty of Arts and Literature', 'code' => 'FSB'],
            ['name' => 'Faculty of Mathematics and Natural Sciences', 'code' => 'FMIPA'],
            ['name' => 'Faculty of Social and Political Sciences', 'code' => 'FISIP'],
        ];

        $faculty = fake()->randomElement($faculties);

        return [
            'name' => $faculty['name'],
            'code' => $faculty['code'],
            'description' => fake()->paragraph(3),
            'dean' => 'Prof. Dr. ' . fake()->name(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'is_active' => true,
        ];
    }
}