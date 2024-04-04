<template>
    <AuthenticatedLayout>
      <div class="main-container">
        <div class="carousel-container">
          <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="4000">
                <img src="../images/CARRUSEL-1.jpg" alt="#">
              </div>
              <div class="carousel-item" data-bs-interval="4000">
                <img src="../images/CARRUSEL-2.jpg" alt="#">
              </div>
              <div class="carousel-item" data-bs-interval="4000">
                <img src="../images/CARRUSEL-3.jpg" alt="#">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  
  <script>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Link } from '@inertiajs/vue3';
  import { Inertia } from "@inertiajs/inertia"
  
  export default {
    components: {
      AuthenticatedLayout,
      Link,
    },
    mounted() {
      document.body.style.overflow = 'hidden'; // Evitar scroll en la vista
    },
    beforeUnmount() {
      document.body.style.overflow = ''; // Restaurar scroll al salir de la vista
    }
  }
  </script>
  
  <style scoped>
  .main-container {
    position: relative;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    overflow: hidden; /* Oculta el scroll */
  }
  
  .carousel-container {
    flex-grow: 1; /* Para que ocupe todo el espacio vertical restante */
    height: 100vh; /* Fija la altura del carousel */
    overflow: hidden; /* Oculta el scroll */
  }
  
  #carouselExampleDark {
    height: 100%; /* Oculta el scroll */
    overflow: hidden; /* Oculta el scroll */
  }
  
  .carousel-item {
    height: 100vh; /* Fija la altura de cada item del carousel */
    width: 100%;
  }
  
  img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
  }
  
  .carousel-control-prev,
  .carousel-control-next {
    color: white; /* Color blanco para el texto */
    font-weight: bold; /* Texto en negrilla */
  }
  
  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
    border-radius: 50%; /* Bordes redondeados */
    padding: 10px; /* Espaciado interno */
  }
  
  .carousel-indicators button {
    background-color: rgba(255, 255, 255, 0.5); /* Color blanco semi-transparente para los indicadores */
  }
  
  .carousel-indicators button.active {
    background-color: white; /* Color blanco para el indicador activo */
  }
  </style>
  