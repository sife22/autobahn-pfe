<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom"=>"Hadi",
            "prenom"=>"Sif eddine",
            "cin"=>"AS12255",
            "numero_permis"=>"PERMIS123",
            "tel"=>'0669084487',
            "date_permis"=>$this->faker->dateTimeThisYear(),
            "date_inscription"=>$this->faker->dateTimeThisYear(),
            "email"=>"sif@gmail.com",
            "password"=>'22',
        ];
    }
}
