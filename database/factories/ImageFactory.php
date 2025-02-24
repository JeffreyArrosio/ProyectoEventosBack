<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Image;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'url' => "https://picsum.photos/id/".$this->faker->randomNumber(3)."/300/300",
            'imageable_id' => fake()->randomDigitNotNull(),
            'imageable_type' => fake()->word(),
        ];
    }
}
