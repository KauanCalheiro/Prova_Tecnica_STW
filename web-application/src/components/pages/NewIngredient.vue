<template>
    <div class="container py-4 px-3 mx-auto">
        <form>

            <div class="form-group mt-3">

                <h2 class="mb-4">INGREDIENTE:</h2>

                <label>INGREDIENTE ID:</label>
                <input class="form-control mt-2 mb-4" type="number" placeholder="Código" v-model="id">

                <label>DESCRIÇÃO: *</label>
                <input class="form-control mt-2 mb-4" type="text" placeholder="Descrição" v-model="description">

                <label>PREVISTO EM KG: *</label>
                <input class="form-control mt-2 mb-4" type="number" placeholder="Kg" v-model="kg">
            </div>


            <div class="d-flex justify-content-between align-items-center ms-3 mt-4 mb-5 me-3">

                <button class="btn btn-primary btn-lg m-2" type="button" @click="save(id, description, kg)">Salvar</button>

                <a class="btn btn-primary btn-lg m-2" type="button" href="/ingredients">Voltar</a>

            </div>

        </form>
    </div>
</template>


<script>
import Ingredient from '../../services/ingredients';

export default {

    data() {
        return {
            id: '',
            description: '',
            kg: ''
        };
    },
    methods: {
        async save(id, description, kg) {
            try {
                await Ingredient.save(id, description, kg).then(() => {
                alert('Item cadastrado com sucesso!');
                window.location.href = '/ingredients';
            });
            } catch (error) {
                alert('Ocorreu um erro ao cadastrar o ingrediente');
            }

        },
    }
};
</script>