<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Association;
use App\Models\Type;
use App\Models\User;

class AssociationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Association::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'max_member' => fake()->numberBetween(0, 1000),
            'telephone' => fake()->numberBetween(600000000, 999999999),
            'email' => fake()->safeEmail(),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'type_id' => Type::inRandomOrder()->first()->id ?? Type::factory(),
        ];
    }
}
