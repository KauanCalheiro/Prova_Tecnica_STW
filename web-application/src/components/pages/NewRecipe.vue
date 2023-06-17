<template>
    <div class="container py-4 px-3 mx-auto">
        <form action="">

            <div class="form-group mb-4 mt-3">
                <h2 class="mb-4">RECEITA:</h2>
                <label for="exampleInputEmail1">RECEITA ID:</label>
                <input class="form-control mb-2" type="number" placeholder="Código" v-model="idRecipe">

                <label>Receita: *</label>
                <input class="form-control" type="text" placeholder="Nome" v-model="recipe">
            </div>

        </form>

        <form>

            <div class="d-flex justify-content-between align-items-center">

                <h2 class="mb-4">INGREDIENTES:</h2>

                <div class="me-2">

                    <button class="btn btn-success btn-lg m-2 pb-3" type="button" v-on:click="addField(ingredients)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </button>

                </div>
            </div>
            <div class="form-group mb-3" v-for="(input, index) in ingredients " :key="`ingredientInput-${index}`">

                <label>Ordem: *</label>
                <input class="form-control mb-2" type="number" placeholder="Número" v-model="input.order">

                <label>Ingrediente: *</label>
                <select class="form-control mb-2" id="id" v-model="input.id">

                    <option v-for="ingredient of ingredientsTable" v-bind:value="ingredient.id">{{ ingredient.id + ": " +
                        ingredient.description + " - " + ingredient.predicted_in_kg + " Kg" }}
                    </option>

                </select>

                <div class="d-flex justify-content-between align-items-center">
                    <div></div>
                    <button class="btn btn-outline-danger btn-lg m-2 me-3 pb-3" id="delButton" type="button"
                        v-on:click="removeField(index, ingredients)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-dash-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                        </svg>
                    </button>
                </div>

            </div>

        </form>

        <div class="d-flex justify-content-between align-items-center ms-3 me-3 mt-4 mb-5">

            <button class="btn btn-primary btn-lg m-2" type="button" @click="save(idRecipe, recipe)">Salvar</button>

            <a class="btn btn-primary btn-lg m-2" type="button" href="/recipes">Voltar</a>

        </div>

    </div>
</template>


<script>
import Recipe from '../../services/recipe';
import Ingredient from '../../services/ingredients';
import { toRaw } from 'vue';

export default {

    data() {
        return {
            ingredientsTable: [],
            idRecipe: 0,
            recipe: '',
            ingredients: [{}],
        };
    },

    mounted() {
        Ingredient.list().then(response => {
            console.log(response.data.data);
            this.ingredientsTable = response.data.data;
        });
    },

    methods: {
        async save(idRecipe, recipeName) {
            try {
                var ingredients = (toRaw(this.ingredients));

                var json = ({
                    "recipe": [
                        {
                            'id': idRecipe,
                            'recipe': recipeName
                        }
                    ],
                    ingredients
                }
                );

                await Recipe.save(json).then(() => {
                    alert('Item cadastrado com sucesso!');
                    window.location.href = '/recipes';
                });

            } catch (error) {
                alert('Ocorreu um erro ao cadastrar a receita');
            }

        },

        addField() {
            this.ingredients.push({});
        },

        removeField(index, ingredient) {
            if(this.ingredients.length > 1){
                ingredient.splice(index, 1)
            }
        }
    }
};
</script>