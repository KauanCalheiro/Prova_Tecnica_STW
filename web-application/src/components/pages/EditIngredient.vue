<template>
    <div class="container py-4 px-3 mx-auto">

        <form>
            <h2>INGREDIENTE: {{ this.id }}</h2>
            <div class="form-group">

                <label>DESCRIÇÃO: *</label>
                <input class="form-control mt-2 mb-4" type="text" placeholder="Descrição" v-model="description">

                <label>PREVISTO EM KG: *</label>
                <input class="form-control mt-2 mb-4" type="number" placeholder="Kg" v-model="kg">
            </div>

        </form>

        <div class="d-flex justify-content-between align-items-center ms-3 mt-4 mb-5 me-3">

            <button class="btn btn-primary btn-lg m-2" type="button" @click="save(description, kg)">Salvar</button>

            <a class="btn btn-primary btn-lg m-2" type="button" href="/ingredients">Voltar</a>

        </div>

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

    created() {
        this.id = this.$route.params.id
        console.log(this.id)
    },

    methods: {
        async save(description, kg) {

            try {
                var json = ({
                    "predicted_in_kg": kg,
                    "description": description
                })

                console.log(json)

                await Ingredient.put(this.id, json).then(() => {
                    alert('Ingrediente cadastrado com sucesso!');
                window.location.href = '/ingredients';

                });
            } catch (error) {
                alert('Ocorreu um erro ao atualizar o ingrediente');
            }
        },
    }
}
</script>