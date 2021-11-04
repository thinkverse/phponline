<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * @return array
     */
    public function definition()
    {
        $import = $this->faker->boolean();

        return [
            'title' => $this->faker->sentence(6),
            'excerpt' => $this->faker->sentence(10),
            'content' => $this->faker->paragraphs(
                $this->faker->numberBetween(4, 20),
                true
            ),
            'status' => '',
            'canonical_url' => $import
                ? $this->faker->url()
                : null,
            'import' => $import,
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
