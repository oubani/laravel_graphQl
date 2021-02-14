<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::unguard();

        $faker = Factory::create();
        User::all()->each(function ($user) use ($faker) {
            foreach (range(1,5) as $i) {
                Article::create([
                    'user_id'=>$user->id,
                    'title'=>$faker->sentence,
                    'content'=>$faker->paragraph(3,true)
                ]);
            }
        } );

    }
}
