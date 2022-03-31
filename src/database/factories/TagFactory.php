<?php

namespace Webfactor\WfBasicFunctionPackage\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Webfactor\WfBasicFunctionPackage\Models\Tag;


class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word()
        ];
    }

    public function modelName()
    {
        return Tag::class;
    }
}
