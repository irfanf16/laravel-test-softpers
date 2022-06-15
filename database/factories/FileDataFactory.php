<?php

namespace Database\Factories;

use App\Models\FileData;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileDataFactory extends Factory
{
    protected $model = FileData::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'data' => $this->faker->words(10, true)
        ];
    }
}
