<?php

namespace Webfactor\WfBasicFunctionPackage\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webfactor\WfBasicFunctionPackage\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::create([
            "title" => "test_gallery_1",
            "description" => "test_galler_1_description",
            "user_id" => 1
        ]);

        //add images

        DB::table("gallery_media")->insert([
            "media_id" => 1,
            "gallery_id" => 1
        ]);
    }
}
