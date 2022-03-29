<?php

namespace Webfactor\WfBasicFunctionPackage\database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Webfactor\WfBasicFunctionPackage\Models\tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            "name" => "test",
        ]);
    }
}
