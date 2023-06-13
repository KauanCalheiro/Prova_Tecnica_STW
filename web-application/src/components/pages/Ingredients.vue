<template>
  <div class="container py-4 px-3 mx-auto">
    <table class="table align-middle table-hover table-bordered table-striped table-active">

      <thead class="text-center table-dark">
        <tr>
          <th class="col-1">CÓDIGO</th>
          <th class="col-5">DESCRIÇÃO</th>
          <th class="col-2">PREVISTO EM KG</th>
          <th class="col-2">OPÇÕES</th>
        </tr>
      </thead>

      <tbody class="list text-center align-middle align-botton">
        <tr v-for="ingredient of ingredientsTable">
          <th class="col ">{{ ingredient.id }}</th>
          <td class="col">{{ ingredient.description }}</td>
          <td class="col">{{ ingredient.predicted_in_kg }} </td>
          <td class="col">

            <router-link role="button" href="#" class="btn btn-primary btn-sm m-2 me-3 ms-3"
              :to="`/edit_ingredient/${ingredient.id}`">
              <i class="bi bi-1-circle"></i>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill"
                viewBox="0 0 16 16">
                <path
                  d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
              </svg>
              Editar
            </router-link>

            <button type="button" class="btn btn-danger btn-sm m-2 ms-3 me-3"
              @click="del(ingredient.id, ingredient.description, ingredient.predicted_in_kg)">

              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill"
                viewBox="0 0 16 16">
                <path
                  d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
              </svg>
              Excluir
            </button>

          </td>
        </tr>
      </tbody>

    </table>
  </div>
</template>



<script>
import Ingredient from '../../services/ingredients'

export default {

  data() {
    return {
      ingredientsTable: []
    };
  },

  mounted() {
    Ingredient.list().then(response => {
      console.log(response.data.data);
      this.ingredientsTable = response.data.data;
    })
  },

  methods: {
    del(id, description, kg) {
      if (confirm("Confirmar exclusao:\nCódigo: " + id + "\nDescrição: " + description + "\nPrevisto em Kg: " + kg)) {
        Ingredient.delete(id).then(() => {
          window.location.reload();
        });
      }
    },
  }
}
</script>
