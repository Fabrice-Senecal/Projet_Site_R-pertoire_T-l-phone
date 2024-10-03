<?php
/**
 * @author Nicolas Fournier & Fabrice Senécal
 */

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Telephone>
 */
class TelephoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_telephone' => $this->faker->phoneNumber(),
            'description' => $this->faker->words(15, true),
            'user_id' => $this->faker->numberBetween(2, 11),
        ];
    }
}
