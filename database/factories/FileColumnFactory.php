<?php

namespace Database\Factories;

use App\Models\FileColumn;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileColumnFactory extends Factory
{
    protected $model = FileColumn::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word
        ];
    }
}
