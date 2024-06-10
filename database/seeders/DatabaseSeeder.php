<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Promise\Create;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Rifqi Fadhilah',
            'username' => 'rifqol',
            'email' => 'rifqifadh1lah586@gmail.com',
            'password' => bcrypt('password')
        ]);


        $this->call([CategorySeeder::class, UserSeeder::class]);
        Post::factory(20)->recycle([
            Category::all(),
            User::all()  
        ])->create();
    }
}
