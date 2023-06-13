<template >
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark flex-sm-nowrap flex-wrap">
    <div class="container-fluid">
      <a class="navbar-brand flex-grow-1 ms-5" href="https://www.stwautomacao.com.br">STW</a>

      <div class="navbar-collapse collapse flex-grow-1 justify-content-center" id="navbar5">
        <ul class="navbar-nav mx-auto">

          <li class="nav-item nav-dark dropdown me-5">
            
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Receita
            </a>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="/recipes">Listar receitas</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="/new_recipe">Cadastrar receita</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown ms-5">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Ingredientes </a>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="/ingredients">Listar ingredientes</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="/new_ingredient">Cadastrar ingrediente</a></li>
            </ul>
          </li>

        </ul>
      </div>
      <div class="flex-grow-1 me-5">
      </div>
    </div>
  </nav>
</template>

<script>
  export default{
    name:'Header'
  }
</script>
