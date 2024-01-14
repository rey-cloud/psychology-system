<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
        {
            return [
                'first_name' => $this->faker->firstName,
                'last_name' => $this->faker->lastName,
                'middle_initial' => $this->faker->optional(0.5)->randomLetter,
                'birth_date' => $this->faker->date,
                'gender' => $this->faker->randomElement(['male', 'female']),
                'phone' => $this->faker->phoneNumber,
                'address' => $this->faker->address,
                'username' => $this->faker->userName,
                'email' => $this->faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'type' => $this->faker->randomElement(['admin', 'guest']),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ];
        }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
