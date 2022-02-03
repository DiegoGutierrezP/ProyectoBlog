<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $posts = Post::factory(300)->create();
       foreach($posts as $post){
           Image::factory(1)->create([
               'imageable_id' => $post->id,
               'imageable_type' => Post::class,
           ]);
           $post->tags()->attach([//agregamnos 2 etiquetas tags a cada post en la tabla post_tag
               rand(1,4),
               rand(5,8)
           ]);
       }
    }
}
