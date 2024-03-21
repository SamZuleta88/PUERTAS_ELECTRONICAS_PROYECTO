<template>
    <div>
      <img class="logo" :src="logoUrl" alt="Logo aplicación">
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        logoUrl: '/images/PUERTAS_LOGO.jpg', // Ruta relativa al logo de la aplicación
      };
    },
  };
  </script>
<style>

.logo {
  width: 100%; /* Ajusta el ancho de la imagen según sea necesario */
  height: 100%; /* Mantiene la proporción de aspecto */
}
</style>

  