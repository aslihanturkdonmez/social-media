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
            'name' => 'Mahmut Öğütcü',
            'username' => 'mahmutt9',
            'email' => '19360859080@ogrenci.btu.edu.tr',
            'email_verified_at' => now(),
            'password' => '123456789', // password
            'grade' => $grades[rand(0, 4)],
            'branch' => $branches[rand(0, 1)],
            'gender' => 'Erkek',
            'remember_token' => Str::random(10),
            'birthday' => '1999-02-07',
        ]);
        \App\Models\User::insert([
            'name' => 'Aslıhan Türkdönmez',
            'username' => 'Aslii',
            'email' => '18360859040@ogrenci.btu.edu.tr',
            'email_verified_at' => now(),
            'password' => '123456789', // password
            'grade' => $grades[rand(0, 4)],
            'branch' => $branches[rand(0, 1)],
            'gender' => 'Kadın',
            'remember_token' => Str::random(10),
            'birthday' => '2000-07-25',
        ]);
        \App\Models\User::insert([
            'name' => 'Ebru Yaşar',
            'username' => 'ebru',
            'email' => '18360859008@ogrenci.btu.edu.tr',
            'email_verified_at' => now(),
            'password' => '123456789', // password
            'grade' => $grades[rand(0, 4)],
            'branch' => $branches[rand(0, 1)],
            'gender' => 'Kadın',
            'remember_token' => Str::random(10),
            'birthday' => '2000-08-10',
        ]);
        \App\Models\User::insert([
            'name' => 'Muhammed İkbal Kılıç',
            'username' => 'mİkbal',
            'email' => '18360859056@ogrenci.btu.edu.tr',
            'email_verified_at' => now(),
            'password' => '123456789', // password
            'grade' => $grades[rand(0, 4)],
            'branch' => $branches[rand(0, 1)],
            'gender' => 'Erkek',
            'remember_token' => Str::random(10),
            'birthday' => '2000-03-05',
        ]);
        \App\Models\User::insert([
            'name' => 'Güven Tuncay',
            'username' => 'güven',
            'email' => '18360859042@ogrenci.btu.edu.tr',
            'email_verified_at' => now(),
            'password' => '123456789', // password
            'grade' => $grades[rand(0, 4)],
            'branch' => $branches[rand(0, 1)],
            'gender' => 'Erkek',
            'remember_token' => Str::random(10),
            'birthday' => '2000-12-28',
        ]);
    }
}
