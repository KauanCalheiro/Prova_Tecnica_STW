<template>
    <div class="container py-4 px-3 mx-auto">

        <form>
            <h2>RECEITA ID: {{ this.id }}</h2>
            <div class="form-group">

                <label>RECEITA:</label>
                <input class="form-control mt-2 mb-4" type="text" placeholder="Descrição" v-model="description">

                <h2>INGREDIENTES:</h2>
                <div class="form-group mb-3" v-for="(input, index) in ingredients " :key="`ingredientInput-${index}`">

                    <div class="form-group mb-3" v-for="(input) in recipeIngredientsTable.ingredients">
                        <label>Ordem:</label>
                        <input class="form-control" type="number" placeholder="Número" v-model="input.order">

                        <label>Ingrediente:</label>
                        <select class="form-control" id="id" v-model="input.id">
                            <option v-for="ingredient of ingredientsTable" v-bind:value="ingredient.id">{{ ingredient.id +
                                ": " +
                                ingredient.description + " - " + ingredient.predicted_in_kg + " Kg" }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>

        </form>

        <div class="d-flex justify-content-between align-items-center ms-5 mt-4 me-5">
            
            <button class="btn btn-primary btn-lg m-2" type="button" @click="save(description)">Salvar</button>

            <a class="btn btn-primary btn-lg m-2" type="button" href="/recipes">Voltar</a>

        </div>

    </div>
</template>


<script>
import Ingredient from '../../services/ingredients';
import Recipe from '../../services/recipe'

import { toRaw } from 'vue';

export default {
    data() {
        return {
            id: '',
            description: '',
            kg: '',

            idRecipe: 0,
            recipe: '',
            ingredients: [{}],

            ingredientsTable: [],
            recipeIngredientsTable: [],
        };
    },

    mounted() {
        Ingredient.list().then(response => {
            console.log(response.data.data);
            this.ingredientsTable = response.data.data;
        });


        Recipe.get(this.id).then(response => {
            this.recipeIngredientsTable = response.data;
        });
    },

    created() {
        this.id = this.$route.params.id
        console.log(this.id)
    },

    methods: {
        async save(description) {
            try {

                var ingredients = (toRaw(this.recipeIngredientsTable.ingredients));
                console.log(ingredients)

                var ingredientsOrder = ([]);

                for (var i = 0; i < ingredients.length; i++) {
                    var results = {
                        'order': ingredients[i].order,
                        "id": ingredients[i].id
                    };

                    var ingredientsOrder = ingredientsOrder.concat(results);

                }

                console.log(ingredientsOrder)

                if (description.length > 0) {
                    var json = ({
                        'recipe': [{
                            "recipe": description
                        }],
                        'ingredients': ingredientsOrder
                    })
                } else {
                    var json = ({
                        'ingredients': ingredientsOrder
                    })
                }

                await Recipe.update(this.id, json).then(() => {
                    alert('Item atualizado com sucesso!');
                    window.location.href = '/recipes';
                })
            } catch (error) {
                alert('Ocorreu um erro ao atualizar a receita');
            }



        },
    }
}
</script>