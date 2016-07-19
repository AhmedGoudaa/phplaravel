<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1000;$i<2000;$i++)
        {
            \App\Post::create([
                'title' => "test title $i" ,
                'content' => "test content test content $i",
                'user_id' => 1,

            ]);
        }
    }
}
