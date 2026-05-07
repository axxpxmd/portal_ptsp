<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
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
            'username' => fake()->unique()->userName(),
            'nama' => fake()->name(),
            'no_telp' => fake()->phoneNumber(),
            'alamat' => fake()->address(),
            'role' => fake()->randomElement(['admin', 'verifikator', 'editor']),
            'password' => static::$password ??= Hash::make('password'),
            'google2fa_secret' => null,
            'google2fa_enabled' => false,
            'google2fa_enabled_at' => null,
            'remember_token' => Str::random(10),
        ];
    }
}
