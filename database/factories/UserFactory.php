<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Default password, you can change it if needed
            'image' => $this->faker->imageUrl(),
            'remember_token' => Str::random(10),
            'address' => $this->faker->streetAddress(), // Sample address, adjust as needed
            'city' => $this->faker->city(), // Sample city, adjust as needed
            'isClient' => true, // Sample value, adjust as needed
            'specialisation' => $this->faker->jobTitle(), // Sample value, adjust as needed
            'codeLogin' => $this->faker->bothify('????????'), // Sample value, adjust as needed
            'isAdmin' => false,
            'isMechanic' => false,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
