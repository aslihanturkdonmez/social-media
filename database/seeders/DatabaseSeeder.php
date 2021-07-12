<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(4)->create();
         //\App\Models\Post::factory(10)->create();
         $grades = ['Hazırlık', '1', '2', '3', '4'];
        $branches = ['Bilgisayar Mühendisliği', 'Makine Mühendisliği'];

        \App\Models\User::insert([
            'name' => 'Aslıhan Türkdönmez',
            'username' => 'Asli',
            'email' => 'aslihanturkdonmez@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$ew7jGkjspgE2ksNiNrAHbeIwc4NVht1O//0OZyFPFLIuT5jjaJR0K', // password: 12345678
            'grade' => $grades[rand(0, 4)],
            'branch' => $branches[rand(0, 1)],
            'gender' => 'Kadın',
            'remember_token' => Str::random(10),
            'birthday' => '2000-07-25',
        ]);

    }
}
