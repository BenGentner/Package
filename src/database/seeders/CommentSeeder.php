<?php

namespace Webfactor\WfBasicFunctionPackage\database\seeders;

use Illuminate\Database\Seeder;
use Webfactor\WfBasicFunctionPackage\Models\Comment;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory(10)->create(["post_id" => 1]);
    }
}
