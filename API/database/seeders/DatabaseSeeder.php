<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Recipe::factory()->create([
            'id' => '58964',
            'recipe' => 'Ração crescimento inicial'
        ]);




        \App\Models\Ingredient::factory()->create([
            'id' => '5698',
            'description' => 'Milho',
            'predicted_in_kg' => '1000'
        ]);

        \App\Models\Ingredient::factory()->create([
            'id' => '5697',
            'description' => 'Farinha',
            'predicted_in_kg' => '500'
        ]);

        \App\Models\Ingredient::factory()->create([
            'id' => '5696',
            'description' => 'Premix',
            'predicted_in_kg' => '250'
        ]);




        \App\Models\RecipeIngredient::factory()->create([
            'id_recipe' => '58964',
            'id_ingredient' => '5698',
            'order' => '1'
        ]);

        \App\Models\RecipeIngredient::factory()->create([
            'id_recipe' => '58964',
            'id_ingredient' => '5697',
            'order' => '2'
        ]);

        \App\Models\RecipeIngredient::factory()->create([
            'id_recipe' => '58964',
            'id_ingredient' => '5696',
            'order' => '3'
        ]);
    }
}
