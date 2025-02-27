<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Type;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'date_start' => $start = fake()->dateTimeBetween('2025-01-01 00:00:00', '2025-12-31 23:59:59'),
            'date_end' => fake()->dateTimeBetween($start, '2025-12-31 23:59:59'),
            'title' => fake()->sentence(4),
            'description' => fake()->text(),
            'access_type' => fake()->randomElement(["all", "anticipated", "exclusive"]),
            'type_id' =>  Type::inRandomOrder()->first()->id ?? Type::factory(),
        ];
    }
}
