<template>
    <div>
      <div class="bg-primary text-white py-3 mb-4 text-center">
        <h1 class="display-6">Catálogo de Productos</h1>
      </div>
  
      <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <!-- Tarjeta 1 -->
          <div class="col">
            <div class="card border-0 shadow-sm">
              <img src="../../../public/images/PUERTA-HIERRO-7.jpg" class="card-img-top" alt="..." @click="openModal('PUERTA-HIERRO-7.jpg')">
              <div class="card-body">
                <h5 class="card-title">Puerta de Hierro</h5>
                <p class="card-text">Puerta resistente y elegante para tu hogar.</p>
                <div class="d-grid gap-2">
                  <button class="btn btn-primary" type="button">Ver</button>
                  <button class="btn btn-success" type="button">Cotizar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Tarjeta 2 -->
          <div class="col">
            <div class="card border-0 shadow-sm">
              <img src="../../../public/images/PUERTA-ALUMINIO-7.jpg" class="card-img-top" alt="..." @click="openModal('PUERTA-ALUMINIO-7.jpg')">
              <div class="card-body">
                <h5 class="card-title">Puerta de Aluminio</h5>
                <p class="card-text">Puerta moderna y duradera para tu hogar.</p>
                <div class="d-grid gap-2">
                  <button class="btn btn-primary" type="button">Ver</button>
                  <button class="btn btn-success" type="button">Cotizar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Tarjeta 3 -->
          <div class="col">
            <div class="card border-0 shadow-sm">
              <img src="../../../public/images/PORTON-ENTRADA-3.jpg" class="card-img-top" alt="..." @click="openModal('PORTON-ENTRADA-3.jpg')">
              <div class="card-body">
                <h5 class="card-title">Portón de Entrada</h5>
                <p class="card-text">Portón robusto y seguro para tu hogar.</p>
                <div class="d-grid gap-2">
                  <button class="btn btn-primary" type="button">Ver</button>
                  <button class="btn btn-success" type="button">Cotizar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Tarjeta 4 -->
          <div class="col">
            <div class="card border-0 shadow-sm">
              <img src="../../../public/images/PORTON-ENTRADA-3.jpg" class="card-img-top" alt="..." @click="openModal('PORTON-ENTRADA-3.jpg')">
              <div class="card-body">
                <h5 class="card-title">Portón de Entrada</h5>
                <p class="card-text">Portón elegante y seguro para tu hogar.</p>
                <div class="d-grid gap-2">
                  <button class="btn btn-primary" type="button">Ver</button>
                  <button class="btn btn-success" type="button">Cotizar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Tarjeta 5 -->
          <div class="col">
            <div class="card border-0 shadow-sm">
              <img src="../../../public/images/PORTON-ENTRADA-3.jpg" class="card-img-top" alt="..." @click="openModal('PORTON-ENTRADA-3.jpg')">
              <div class="card-body">
                <h5 class="card-title">Portón de Entrada</h5>
                <p class="card-text">Portón seguro y elegante para tu hogar.</p>
                <div class="d-grid gap-2">
                  <button class="btn btn-primary" type="button">Ver</button>
                  <button class="btn btn-success" type="button">Cotizar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Tarjeta 6 -->
          <div class="col">
            <div class="card border-0 shadow-sm">
              <img src="../../../public/images/PORTON-ENTRADA-3.jpg" class="card-img-top" alt="..." @click="openModal('PORTON-ENTRADA-3.jpg')">
              <div class="card-body">
                <h5 class="card-title">Portón de Entrada</h5>
                <p class="card-text">Portón moderno y seguro para tu hogar.</p>
                <div class="d-grid gap-2">
                  <button class="btn btn-primary" type="button">Ver</button>
                  <button class="btn btn-success" type="button">Cotizar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <!-- Modal -->
      <div class="modal" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body text-center">
              <img :src="modalImageUrl" class="img-fluid" alt="...">
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      productos: Array
    },
    data() {
      return {
        modalImageUrl: ''
      };
    },
    methods: {
      openModal(imageUrl) {
        this.modalImageUrl = imageUrl;
        $('#imageModal').modal('show');
      }
    }
  };
  </script>
  
  <style scoped>
  .bg-primary {
    background-color: #80B9FF;
  }
  
  .card {
    border-radius: 10px;
    transition: transform 0.3s;
  }
  
  .card:hover {
    transform: translateY(-5px);
  }
  
  .card-img-top {
    border-radius: 10px 10px 0 0;
    max-height: 350px;
    object-fit: cover;
    cursor: pointer;
  }
  
  .card-body {
    padding: 1rem;
  }
  
  .card-title {
    font-size: 1.1rem;
    font-weight: bold;
  }
  
  .card-text {
    font-size: 0.9rem;
  }
  
  .btn-primary {
    background-color: #80B9FF;
    color: white;
    font-weight: bold;
    border: none;
  }
  
  .btn-success {
    background-color: #28A745;
    color: white;
    font-weight: bold;
    border: none;
  }
  
  .modal-content {
    background-color: transparent;
    border: none;
  }
  
  .modal-body {
    padding: 0;
  }
  </style>
  