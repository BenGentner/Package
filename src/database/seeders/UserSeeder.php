<?php

namespace  Webfactor\WfBasicFunctionPackage\database\seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           "name" => "Ben Gentner",
           "email" => "gentners.ben@gmail.com",
           "password" => bcrypt("password")
        ]);
    }
}
