<?php

namespace Webfactor\WfBasicFunctionPackage\database\seeders;

use Illuminate\Database\Seeder;
use Webfactor\WfBasicFunctionPackage\Models\Media;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::create([
           "title" => "test",
           "slug" => "test",
            "user_id" => 1,
            "path" => "IxrOTURdc38QmfwTFM5BndhEFUGf1zuvsucLmhXz.jpg"
        ]);
    }
}
