<?php

namespace Webfactor\WfBasicFunctionPackage\database\factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Webfactor\WfBasicFunctionPackage\Models\Comment;
use Webfactor\WfBasicFunctionPackage\Models\Post;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => User::factory(),
            "post_id" => Post::factory(),
            "body" => implode($this->faker->paragraphs(5)),
        ];
    }

    public function modelName()
    {
        return Comment::class;
    }
}
