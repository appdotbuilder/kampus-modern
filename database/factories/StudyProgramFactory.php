<?php

namespace Database\Factories;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudyProgram>
 */
class StudyProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $programs = [
            'Computer Science', 'Information Technology', 'Software Engineering',
            'Mechanical Engineering', 'Civil Engineering', 'Electrical Engineering',
            'Business Administration', 'Management', 'Accounting',
            'Medicine', 'Nursing', 'Pharmacy',
            'Law', 'International Law', 'Criminal Law',
            'English Literature', 'Indonesian Literature', 'History',
            'Mathematics', 'Physics', 'Chemistry', 'Biology',
            'Political Science', 'Sociology', 'International Relations'
        ];

        $levels = ['D3', 'S1', 'S2', 'S3'];
        $accreditations = ['A', 'B', 'C', 'Unggul', 'Baik Sekali', 'Baik'];

        return [
            'faculty_id' => Faculty::factory(),
            'name' => fake()->randomElement($programs),
            'code' => fake()->unique()->lexify('??') . fake()->numerify('##'),
            'level' => fake()->randomElement($levels),
            'description' => fake()->paragraph(2),
            'accreditation' => fake()->randomElement($accreditations),
            'duration_semesters' => fake()->randomElement([6, 8, 10, 12]),
            'is_active' => fake()->boolean(90),
        ];
    }
}