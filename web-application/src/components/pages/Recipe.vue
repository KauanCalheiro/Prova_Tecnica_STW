<template>
    <div class="container py-4 mx-auto">

        <h1>{{  teste }}</h1>

        <table class="table align-middle table-hover table-bordered table-striped table-active">
            <thead class="text-center align-middle">
                <tr>
                    <th class="col-2">Codigo: {{ recipeTable.id }}</th>
                    <th class="col">Receita: {{ recipeTable.recipe }}</th>
                </tr>
            </thead>
        </table>

        <table class="table align-middle table-hover table-bordered table-striped table-active">
            <thead class="align-middle">
                <tr>
                    <th class="ps-5">INGREDIENTES</th>
                </tr>
            </thead>
        </table>
        <table class="table align-middle table-hover table-bordered table-striped table-active">
            <thead class="text-center align-middle">
                <tr>
                    <th class="col-1">ORDEM</th>
                    <th class="col-2">CÓDIGO</th>
                    <th class="col-5">DESCRIÇÃO</th>
                    <th class="col-2">PREVISTO EM KG</th>
                </tr>
            </thead>

            <tbody class="list text-center align-middle">
                <tr v-for="ingredient of ingredientsTable">
                    <th class="col-1">{{ ingredient.order }}</th>
                    <td class="col-2 ">{{ ingredient.id }}</td>
                    <td class="col-5">{{ ingredient.description }}</td>
                    <td class="col-2">{{ ingredient.predicted_in_kg }}</td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center me-2">

            <div></div>

            <a role="button" href="/recipes" class="btn btn-primary btn-lg mt-3">Voltar</a>

        </div>
        
    </div>
</template>

<script>
import Recipe from '../../services/recipe'


export default {
    name: 'Recipe',
    data() {

        return {
            recipeTable: [],
            ingredientsTable: [],
            id: ''
        };
    },

    mounted() {
        Recipe.get(this.id).then(response => {
            this.recipeTable = response.data.recipe[0];
            this.ingredientsTable = response.data.ingredients;
        })
    },

    created(){
        this.id = this.$route.params.id
        console.log(this.id)
    }
}
</script>