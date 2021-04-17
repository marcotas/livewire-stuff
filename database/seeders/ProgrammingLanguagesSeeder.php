<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\ProgrammingLanguage;
use Illuminate\Database\Seeder;

class ProgrammingLanguagesSeeder extends Seeder
{
    public function run()
    {
        $group1 = Group::factory()->create(['name' => 'Favoritos']);
        $group2 = Group::factory()->create(['name' => 'Nem Tão Favoritos']);
        $group3 = Group::factory()->create(['name' => 'Tenho Interesse']);
        $favorites = collect(['Dart', 'Ruby', 'Javascript']);
        $notFavorites = collect(['Python', 'PHP']);
        $favorites->map(
            fn ($name) => ProgrammingLanguage::factory()->for($group1)->create(compact('name'))
        );
        $notFavorites->map(
            fn ($name) => ProgrammingLanguage::factory()->for($group2)->create(compact('name'))
        );
    }
}
