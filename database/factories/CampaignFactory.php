<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'channel' => $this->faker->company(),
            'source' => $this->faker->sentence(),
            'campaign_name' => $this->faker->sentence(),
            'target_url' => $this->faker->url(),
            'user_id' =>  rand(1, 50)
        ];
    }
}
