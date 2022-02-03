<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');//elimina la carpeta posts
        Storage::makeDirectory('posts');//crea una carpeta en la carpeta storage dentro de public

        $this->call(RoleSeeder::class);

        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);

        Category::factory(4)->create();

        Tag::factory(8)->create();

        $this->call(PostSedeer::class);
    }
}
