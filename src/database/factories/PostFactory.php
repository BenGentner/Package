<?php

namespace Webfactor\WfBasicFunctionPackage\database\factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Webfactor\WfBasicFunctionPackage\Models\Category;
use Webfactor\WfBasicFunctionPackage\Models\Post;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence(),
            "slug" => $this->faker->slug(),
            'excerpt' => '<p>' . implode('</p><p>' , $this->faker->paragraphs(2)) .'</p>',
            'body' => '<p>' . implode('</p><p>' , $this->faker->paragraphs(7)) .'</p>',
            "user_id" => User::factory(),
            "category_id" => Category::factory(),
        ];
    }

    public function modelName()
    {
        return Post::class;
    }



}
