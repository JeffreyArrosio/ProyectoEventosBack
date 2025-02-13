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
            'date_start' => fake()->dateTime(),
            'date_end' => fake()->dateTime(),
            'title' => fake()->sentence(4),
            'description' => fake()->text(),
            'type_id' => Type::factory(),
        ];
    }
}
