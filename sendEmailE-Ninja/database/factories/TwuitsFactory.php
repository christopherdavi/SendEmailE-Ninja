<?php

namespace Database\Factories;

use App\Models\Twuits;
use Illuminate\Database\Eloquent\Factories\Factory;

class TwuitsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Twuits::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'publicaciones' => $this->faker->text,
        ];
    }
}
