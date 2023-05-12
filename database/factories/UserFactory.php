<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use Carbon\Carbon;

class UserFactory extends Factory
{

    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = new Faker;
        $fecha = Carbon::now()->toDateTimeString();
        return [
            'tipoUsu' => "admin",
            'nombre' => "admin",
            'apellido' => "user",
            'email' => "admin@gmail.com",
            'password' => Hash::make("1234"), // password
            'fecha_creacion' => Carbon::createFromFormat('Y-m-d H:i:s', $fecha)->format('d/m/Y H:i:s'),
        ];
    }

}
