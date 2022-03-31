<?php

namespace Webfactor\WfBasicFunctionPackage\database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Webfactor\WfBasicFunctionPackage\Models\post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
           "category_id" => 1,
           "user_id" => 1,
           "title" => "First Post",
           "excerpt" => "Excerpt: First Post",
           "body" => "Body of the first Post",
            "slug"=> "first_post"
        ]);
        Post::create([
            "category_id" => 1,
            "user_id" => 1,
            "title" => "Second Post",
            "excerpt" => "Excerpt: Second Post",
            "body" => "Body of the second Post",
            "slug"=> "second_post"
        ]);
        Post::create([
            "category_id" => 1,
            "user_id" => 1,
            "title" => "Third Post",
            "excerpt" => "Excerpt: Third Post",
            "body" => "Body of the third Post",
            "slug"=> "third_post"
        ]);
    }
}
