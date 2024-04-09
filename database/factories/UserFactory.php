<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "first_name" => fake()->firstName(),
            "middle_name" =>  fake()->lastName(),
            "last_name" => fake()->lastName(),
            "suffix_name" => fake()->suffix(),
            "birth_date" => fake()->date(),
            "gender_id" => fake()->numberBetween(1, 2),
            "address" => fake()->streetAddress(),
            "contact_num" => fake()->phoneNumber(),
            "email_address" => fake()->safeEmail(),
            "username" => fake()->userName(),
            "password" => password_hash('password', PASSWORD_BCRYPT),
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
