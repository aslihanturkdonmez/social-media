<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $email=$this->faker->unique()->safeEmail;
        
        $grades = ['Hazırlık', '0', '1', '2', '3', '4'];
        $branches = ['Bilgisayar Mühendisliği', 'Makine Mühendisliği'];
        $genders = ['Erkek', 'Kadın'];

        return [
            'name' => $this->faker->name,
            'username' => $this->faker->name,
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => now(),
            'password' => '12345678', // password
            'grade' => $grades[rand(0, 5)],
            'branch' => $branches[rand(0, 1)],
            'gender' => $genders[rand(0, 1)],
            'remember_token' => Str::random(10),
            'birthday' => $this->faker->date,  
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
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