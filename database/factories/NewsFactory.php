<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            'New Research Center Opens at University Campus',
            'International Partnership Agreement Signed',
            'Student Achievement in National Competition',
            'Faculty Development Workshop Concluded',
            'Campus Infrastructure Modernization Project',
            'Scholarship Program for Outstanding Students',
            'Alumni Success Stories: Making Impact in Industry',
            'University Receives Accreditation Excellence Award',
            'Innovative Teaching Methods Implementation',
            'Community Service Program Launches This Semester'
        ];

        $title = fake()->randomElement($titles);
        $publishedAt = fake()->dateTimeBetween('-6 months', 'now');

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . fake()->randomNumber(4),
            'excerpt' => fake()->paragraph(1),
            'content' => fake()->paragraphs(5, true),
            'image' => null,
            'user_id' => User::factory(),
            'status' => 'published',
            'published_at' => $publishedAt,
            'created_at' => $publishedAt,
            'updated_at' => $publishedAt,
        ];
    }

    /**
     * Indicate that the news is a draft.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'draft',
            'published_at' => null,
        ]);
    }
}