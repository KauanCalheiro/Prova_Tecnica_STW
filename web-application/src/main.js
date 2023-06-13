import { createApp } from 'vue'
import App from './App.vue'
import './scss/styles.scss'
import { Popover } from 'bootstrap';

import { createRouter, createWebHistory } from 'vue-router';


import Recipes from './components/pages/Recipes.vue';
import Recipe from './components/pages/Recipe.vue';
import NewRecipe from './components/pages/NewRecipe.vue';
import Ingredients from './components/pages/Ingredients.vue';
import NewIngredient from './components/pages/NewIngredient.vue';
import EditRecipe from './components/pages/EditRecipe.vue';
import EditIngredient from './components/pages/EditIngredient.vue';

const routes = [
  {
    path: '/',
    component: Recipes
  },
  {
    path: '/recipes',
    component: Recipes
  },
  {
    path: '/recipe/:id',
    component: Recipe
  },
  {
    path: '/new_recipe',
    component: NewRecipe
  },
  {
    path: '/edit_recipe/:id',
    component: EditRecipe
  },
  {
    path: '/ingredients',
    component: Ingredients
  },
  {
    path: '/new_ingredient',
    component: NewIngredient
  },
  {
    path: '/edit_ingredient/:id',
    component: EditIngredient
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

const app = createApp(App);
app.use(router)
app.mount('#app');
