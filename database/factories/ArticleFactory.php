<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Guild;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->paragraph($nbSentences = 10, $variableNbSentences = true),
            'created_at' => Carbon::now(),
            'type' => 2,
            'guild_id' => Guild::all()->random()->id,
        ];
    }
}
