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
    }
}
