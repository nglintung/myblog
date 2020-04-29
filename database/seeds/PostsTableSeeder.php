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
        Factory(App\Post::class, 2)->create([
            'image' => 'sample.jpg',
        ]);
    }
}
