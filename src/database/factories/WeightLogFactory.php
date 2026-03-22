<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WeightLog;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = WeightLog::class;
    public function definition()
    {
        return [
            'date'=> $this->faker->date(),
            'weight'=> $this->faker->randomFloat(1,40,1000),
            'calories'=> $this->faker->numberBetween(1000,3000),
            'exercise_time'=> $this->faker->time('H:i'),
            'exercise_content'=> $this->faker->realText(50),
        ];
    }
}
