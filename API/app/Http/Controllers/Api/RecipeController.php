<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{

    public function index()
    {
        return Recipe::all();
    }


    public function show(string $id)
    {
        $ingredients = DB::table('recipes_ingredients')
            ->select('recipes_ingredients.order', 'ingredients.id', 'ingredients.description', 'ingredients.predicted_in_kg')
            ->join('recipes', 'recipes.id', '=', 'recipes_ingredients.id_recipe')
            ->join('ingredients', 'ingredients.id', '=', 'recipes_ingredients.id_ingredient')
            ->where('recipes.id', '=', $id)
            ->orderBy('order', 'asc')
            ->get();

        return ['recipe' => [Recipe::findOrFail($id)], 'ingredients' => $ingredients];
    }


    public function store(StoreRecipeRequest $request)
    {
        $recipe = $request['recipe'];
        $ingredients = $request['ingredients'];

        if (count($recipe) === 1) {
            $recipe = Recipe::create($recipe['0']);
        } else {
            return ['message' => 'Recipe list must have just one recipe'];
        }

        foreach ($ingredients as $ingredient) {
            Ingredient::findOrFail($ingredient['id']);
            RecipeIngredient::create([
                'id_recipe' => $recipe['id'],
                'id_ingredient' => $ingredient['id'],
                'order' => $ingredient['order']
            ]);
        }
        return $request;
    }


    public function update(StoreRecipeRequest $request, string $id)
    {
        if (!empty($request['recipe'])) {
            DB::table('recipes')
                ->where('id', '=', $id)
                ->update(['recipe' => $request['recipe']['0']['recipe']]);
        } else {
            return 'vazio';
        }

        $recipeIngredients = DB::table('recipes_ingredients')
            ->where('id_recipe', '=', $id)
            ->get();

        if (count($recipeIngredients) > 0) {
            $ingredients = $request['ingredients'];

            for ($i = 0; $i < count($ingredients); $i++) {

                DB::table('recipes_ingredients')
                    ->where('id_recipe', '=', $id)
                    ->where('order', '=', $recipeIngredients[$i]->order)
                    ->where('id_ingredient', '=', $recipeIngredients[$i]->id_ingredient)
                    ->update([
                        'order' => $ingredients[$i]['order'],
                        'id_ingredient' => $ingredients[$i]['id']
                    ]);
            }

        } else {
            return ['message' => 'Recipe list not found'];
        }

        return $request;
    }


    public function destroy(string $id)
    {
        DB::table('recipes_ingredients')
            ->where('id_recipe', '=', $id)
            ->delete();

        DB::table('recipes')
            ->where('id', '=', $id)
            ->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
