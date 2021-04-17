<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\ProgrammingLanguage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammingLanguageFactory extends Factory
{
    protected $model = ProgrammingLanguage::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(rand(2, 5), true),
            'group_id' => Group::factory(),
        ];
    }
}
