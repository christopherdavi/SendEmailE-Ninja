<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombres' => $this->faker->name,
            'apellidos' => $this->faker->name,
            'telefono' => $this->faker->numberBetween(1000000000,9999999999),
            'correo' => $this->faker->unique()->safeEmail,
            'estado_id' => $this->faker->numberBetween(1,2),
        ];
    }
}
