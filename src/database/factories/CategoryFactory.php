<?php

namespace Webfactor\WfBasicFunctionPackage\database\factories;;

use Illuminate\Database\Eloquent\Factories\Factory;
use Webfactor\WfBasicFunctionPackage\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug()
        ];
    }

    public function modelName()
    {
        return Category::class;
    }
}
