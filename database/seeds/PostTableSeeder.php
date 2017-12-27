<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new \App\Post( [
            'title' => 'Title 1',
            'content' => 'Contentmin10 1',
            'user_id' => '1'
        ]);
        $post->save();
        $post = new \App\Post( [
            'title' => 'Title 2',
            'content' => 'Contentmin10 2',
            'user_id' => '2'
        ]);
        $post->save();
    }
}
