<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Policy>
 */
class PolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $policy_type = ['default','premium'];
        return [
            'customer_name' => $this->faker->name(),
            'customer_address' => $this->faker->address(),
            'policy_type'=> $policy_type[array_rand($policy_type)],
            'premium'=>$this->faker->numberBetween($min = 1500, $max = 6000),
            'insurer_name' => $this->faker->name(),
            'client_id' => Client::factory(1)->create()->first(),
        ];
    }
}
