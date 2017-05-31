<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5; $i++) { 
        	Post::create([
        		'title' => 'Title '.$i,
        		'post' => 'This is post of '.$i
        	]);
        }
    }
}
