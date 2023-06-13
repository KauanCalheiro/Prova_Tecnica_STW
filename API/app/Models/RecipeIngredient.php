<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'recipes_ingredients';
    protected $fillable =  [
        'id_recipe',
        'id_ingredient',
        'order'
    ];
}
