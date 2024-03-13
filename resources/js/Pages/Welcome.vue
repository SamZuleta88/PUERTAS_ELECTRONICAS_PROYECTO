<template>
    <div>
      <nav class="navbar">
        <div class="container mx-auto px-4">
          <div class="flex justify-between items-center py-4">
            <div class="flex space-x-4">
              <Link href="#">COTIZADOR</Link>
              <Link href="#">COTIZACIONES</Link>
              <Link href="#">CATÁLOGO</Link>
            </div>
            <div class="ml-auto">
              <Link :href="route('login')">INICIAR SESIÓN</Link>
              <Link v-if="canRegister" :href="route('register')">REGISTRARSE</Link>
            </div>
          </div>
        </div>
      </nav>

      <main class="container mx-auto px-4">
        <div class="text-center py-8">
          <h1 class="text-3xl font-bold mb-4">Bienvenido a Puertas Electrónicas</h1>
          <p class="text-lg">Descubre nuestro catálogo de productos y crea cotizaciones personalizadas.</p>
        </div>
      </main>

      <footer class="text-center py-4">
        <p>&copy; 2024 Puertas Electrónicas. Todos los derechos reservados.</p>
      </footer>
    </div>
  </template>

  <script setup>
  import { defineProps } from 'vue';
  import { Link } from '@inertiajs/vue3';

  defineProps({
    canRegister: Boolean,
  });
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
