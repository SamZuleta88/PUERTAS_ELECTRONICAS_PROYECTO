<template>

    <AuthenticatedLayout>
      <template>
  <AuthenticatedLayout>
    <section class="hero">
      <div class="container">
        <div class="hero-content">
          <h1>Modernice su entrada: Puertas automáticas</h1>
          <p class="lead">
            Mejore la seguridad, la comodidad y el estilo con nuestras puertas electrónicas de alta calidad. Fabricamos, automatizamos e instalamos la solución perfecta para sus necesidades.
          </p>
          <div class="hero-cta">
            <router-link to="/get-a-quote" class="btn btn-primary">Solicite un presupuesto gratuito</router-link>
          </div>
        </div>
      </div>
    </section>

    <section class="benefits">
      <div class="container">
        <h2>Ventajas de las puertas electrónicas</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="benefit-item">
              <i class="fas fa-lock"></i>
              <h3>Seguridad mejorada</h3>
              <p>Controle el acceso con facilidad y disuada el acceso no autorizado.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="benefit-item">
              <i class="fas fa-concierge-bell"></i>
              <h3>Comodidad inigualable</h3>
              <p>Disfrute de un funcionamiento manos libres y control de acceso remoto.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="benefit-item">
              <i class="fas fa-eye"></i>
              <h3>Estilo elevado</h3>
              <p>Complemente la estética de su propiedad con una variedad de diseños.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="carousel-section">
      <div class="container">
        <h2>Explore nuestras opciones de puertas</h2>
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
              <img src="../images/WELDER-1.jpg" alt="Fabricación de puertas automáticas">
              <div class="carousel-caption d-none d-md-block">
                <h5>Nuestro proceso de fabricación</h5>
                <p>
                  Experimente nuestra artesanía experta y materiales de primera calidad.
                </p>
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="../images/PUERTA-ALUMINIO-7.jpg" alt="Puerta automática moderna">
              <div class="carousel-caption d-none d-md-block">
                <h5>Diseños modernos y elegantes</h5>
                <p>
                  Eleve la apariencia de su propiedad con nuestros estilos modernos.
                </p>
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="../images/PUERTAS_LOGO.jpg" alt="Instalación de puerta electrónica">
              <div class="carousel-caption d-none d-md-block">
                <h5>Instalación sin problemas</h5>
                <p>
                  Nuestros profesionales garantizan una instalación rápida y eficiente.
                </p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
      </div>
    </section>
  </AuthenticatedLayout>
</template>

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

}

</script>

<style scoped>

#carouselExampleDark {
    height: 70vh;
    overflow: hidden;
}

.carousel-item {
    height: 70vh;
    width: 100%;
}

img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
}

/* Estilos para la sección de héroe */
.hero {
  background-color: #f8f9fa;
  padding: 100px 0;
  text-align: center;
}

.hero h1 {
  font-size: 2.5rem;
  color: #343a40;
}

.hero p {
  font-size: 1.25rem;
  color: #6c757d;
}

/* Estilos para la sección de beneficios */
.benefits {
  background-color: #ffffff;
  padding: 80px 0;
}

.benefits h2 {
  text-align: center;
  margin-bottom: 50px;
  color: #343a40;
}

.benefit-item {
  text-align: center;
  margin-bottom: 30px;
}

.benefit-item i {
  font-size: 3rem;
  color: #007bff;
}

.benefit-item h3 {
  font-size: 1.5rem;
  color: #343a40;
}

.benefit-item p {
  font-size: 1.25rem;
  color: #6c757d;
}

/* Estilos para la sección del carrusel */
.carousel-section {
  padding: 80px 0;
  background-color: #f8f9fa;
}

.carousel-section h2 {
  text-align: center;
  margin-bottom: 50px;
  color: #343a40;
}
</style>


