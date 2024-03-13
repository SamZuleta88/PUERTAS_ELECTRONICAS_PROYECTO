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
  