<template>

<h1 class="bg-danger text-white py-2 mb-3 text-center">Catalogo de Productos</h1>

    <div>
        <ul>
            <li v-for="producto in productos" :key="producto.id">{{ producto.nombre }}</li>
        </ul>
    </div>
<body>
    <section class="container">
        <div class="row  justify-content-md-center text-center">
            <div class="col-md-2"></div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-xs-12">
                <div class="card">
                    <img src="../../../public/images/PUERTA-HIERRO-7.jpg" class="imgc" alt="...">
                    <div class="card-body">
                        <p class="card-text">Puerta de Hierro</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-xs-12">
                <div class="card">
                    <img src="../../../public/images/PUERTA-ALUMINIO-7.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Puerta de Aluminio</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </section>  
    <br>
    <hr />
    <br>
    <section class="container">
        <div class="row  justify-content-md-center text-center">
            <div class="col-md-2"></div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-xs-12">
                <div class="card">
                    <img src="../../../public/images/PORTON-ENTRADA-3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Porton de Entrada</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-xs-12">
                <div class="card">
                    <img src="../../../public/images/PORTON-ENTRADA-3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Porton de Entrada</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </section>  

<!-- <section class="contenido">
    <div class="mostrador" id="mostrador">
    <div class="fila">
        <div class="item" onclick="cargar(this)">
            <div class="contenedor-foto">
                <img src="../../../public/images/PORTON-ENTRADA-3.jpg" alt="" style="width: 350px; height: 270px;">
            </div>
        </div>
    </div>
</div>
      <p class="descripcion">NIKE AIR 97</p>
                    <span class="precio">$ 1.300</span>

        <div class="item" onclick="cargar(this)">
        <div class="contenedor-foto">
        <img src="../../../public/images/PORTON-ENTRADA-3.jpg" alt="" style="width: 350px; height: 270px;">
        </div>

        <p class="descripcion" id>Nike Running tierra </p>
        <span class="precio">$1.800</span>
   </div>
   <div class="item" onclick="cargar(this)">
   <div class="contenedor-foto">
   <img src="../../../public/images/PUERTA-ALUMINIO-7.jpg" alt="puerta" style="width: 350px; height: 270px;">
   </div>

    </div>

     <p class="descripcion" id>Vida </p>
        <span class="precio">$2000</span>

   <div class="item" onclick="cargar(this)">
   <div class="contenedor-foto">
   <img src="../../../public/images/PUERTA-HIERRO-7.jpg" alt="" style="width: 350px; height: 270px;">
   </div>
    </div>
     <h1 class="background">Catálogo de ventanas</h1> -->



<!-- </section> -->
    </body>
</template>

<script>

export default {

    props: {
        productos: Object
    },

    data() {
        return {
        };
    },
}

</script>

