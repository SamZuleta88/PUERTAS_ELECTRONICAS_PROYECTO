<template>
  <nav class="navbar" style="background-color: #80B9FF;">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center py-4">
        <div>
          <div class="logo" style="display: flex; align-items: center; color: #fff; text-decoration: none;">
            <img src="/images/PUERTAS_LOGO.jpg" alt="Logo" style="width: 40px; height: auto; margin-right: 8px;">
          </div>
        </div>
        <div class="flex space-x-4">
          <a href="/dashboard" class="text-lg">Cotizador</a>
          <a href="/cotizaciones" class="text-lg">Cotizaciones</a>
          <a href="/catalogo" class="text-lg">Catálogo</a>
        </div>
        <div class="flex items-center space-x-4">
          <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="text-lg focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <div v-if="showingNavigationDropdown" class="bg-gray-100 border border-gray-200 mt-2 py-2 px-4 rounded-lg">
    <a href="/login" class="text-lg block">Iniciar sesión</a>
    <a href="/register" class="text-lg block">Registrarse</a>
  </div>

  <main class="container mx-auto px-4">
    <div class="text-center py-8">
      <h1 class="text-3xl font-bold mb-4">Bienvenido a Puertas Electrónicas</h1>
      <p class="text-lg">Descubre nuestro catálogo de productos y crea cotizaciones personalizadas.</p>
    </div>
  </main>

  <footer class="text-center py-4" style="background-color: #80B9FF; color: #fff;">
    <p>&copy; 2024 Puertas Electrónicas. Todos los derechos reservados.</p>
  </footer>
</template>

<script setup>
import { ref } from 'vue';

const showingNavigationDropdown = ref(false);
</script>

<style>
/* Estilos para el navbar */
.navbar {
  background-color: #80B9FF;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.navbar a {
  color: #fff;
  text-decoration: none;
  padding: 0.5rem 1rem;
}

.navbar a:hover {
  background-color: #FFDE59;
}

.logo {
  display: flex;
  align-items: center;
  color: #fff;
  text-decoration: none;
}

.logo img {
  width: 40px;
  height: auto;
  margin-right: 8px;
}

/* Estilos para el contenido principal */
main {
  min-height: calc(100vh - 200px); /* Ajusta según el tamaño de tu navbar y footer */
}

/* Estilos para el footer */
footer {
  background-color: #80B9FF;
  color: #fff;
}
</style>
