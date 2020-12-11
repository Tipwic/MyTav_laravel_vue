<?php

namespace Database\Factories;

use App\Models\Guild;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuildFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guild::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'short_desc' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'created_at' => Carbon::now(),
        ];
    }
}
