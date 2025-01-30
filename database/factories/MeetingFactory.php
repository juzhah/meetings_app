<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Location;
use App\Models\Meeting;
use App\Models\Modality;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meeting>
 */
class MeetingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->text(),
            'banner_image' => fake()->imageUrl(),
            'occurence_day' => fake()->date(),
            'attendants_capacity_limit' => rand(0, 9999),
            'attendants_count' => rand(100, 564),

            'organizer_id' => User::pluck('id')->random(),
            'category_id' => Category::pluck('id')->random(),
            'location_id' => Location::pluck('id')->random(),
            'modality_id' => Modality::pluck('id')->random(),

        ];
    }
}
