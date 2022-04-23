<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Faker\Provider\HtmlLorem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name'=>'Alex-admin',
            'email'=>'alex@gmail.com',
            'role'=>'admin',
            'password'=>bcrypt('test1'),
        ]);
        User::create([
            'name'=>'Lukas-user',
            'email'=>'lukas@gmail.com',
            'role'=>'user',
            'password'=>bcrypt('test1'),
        ]);
        User::create([
            'name'=>'Paul-user',
            'email'=>'paul@gmail.com',
            'role'=>'user',
            'password'=>bcrypt('test1'),
        ]);
        User::create([
            'name'=>'Oygen-admin',
            'email'=>'oygen@gmail.com',
            'role'=>'admin',
            'password'=>bcrypt('test1'),
        ]);

        Post::create([
            'user_id' => '3',
            'name' => 'First post',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, facere quo ratione sint debitis alias aliquam, atque architecto praesentium magni quidem! Neque perspiciatis cupiditate, illo doloribus facere consectetur illum nisi?',
            
        ]);
        Post::create([
            'name'=>'Second post',
            'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, facere quo ratione sint debitis alias aliquam, atque architecto praesentium magni quidem! Neque perspiciatis cupiditate, illo doloribus facere consectetur illum nisi?',
            'user_id' => '2',
        ]);
        Post::create([
            'name'=>'Third post',
            'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, facere quo ratione sint debitis alias aliquam, atque architecto praesentium magni quidem! Neque perspiciatis cupiditate, illo doloribus facere consectetur illum nisi?',
            'user_id' => '3',
        ]);
        Post::create([
            'name'=>'Forth post',
            'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, facere quo ratione sint debitis alias aliquam, atque architecto praesentium magni quidem! Neque perspiciatis cupiditate, illo doloribus facere consectetur illum nisi?',
            'user_id' => '3',
        ]);
        Post::create([
            'name'=>'Fifth post',
            'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, facere quo ratione sint debitis alias aliquam, atque architecto praesentium magni quidem! Neque perspiciatis cupiditate, illo doloribus facere consectetur illum nisi?',
            'user_id' => '2',
        ]);
        Post::create([
            'name'=>'Sixth post',
            'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, facere quo ratione sint debitis alias aliquam, atque architecto praesentium magni quidem! Neque perspiciatis cupiditate, illo doloribus facere consectetur illum nisi?',
            'user_id' => '3',
        ]);
    }
}
