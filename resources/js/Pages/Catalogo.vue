<template>
    <div>
        <h1 class="background">Catálogo de productos</h1>
        <ul>
            <li v-for="producto in productos" :key="producto.id">{{ producto.nombre }}</li>
        </ul>
    </div>
<body>
<section class="contenido">
    <div class="mostrador" id="mostrador">
    <div class="fila">
        <div class="item" onclick="cargar(this)">
            <div class="contenedor-foto">
                <img src="/public/images/PORTON-ENTRADA-3.jpg" alt="">
            </div>
        </div>
    </div>
</div>
      <p class="descripcion">NIKE AIR 97</p>
                    <span class="precio">$ 1.300</span>

        <div class="item" onclick="cargar(this)">
        <div class="contenedor-foto">
        <img src="/public/images/PORTON-ENTRADA-3.jpg" alt="">
        </div>

        <p class="descripcion" id>Nike Running tierra </p>
        <span class="precio">$1.800</span>
   </div>
   <div class="item" onclick="cargar(this)">
   <div class="contenedor-foto">
   <img src="{{ asset('images/PUERTA-ALUMINIO-7.jpg') }}" alt="puerta">
   </div>

    </div>

     <p class="descripcion" id>Vida </p>
        <span class="precio">$2000</span>

   <div class="item" onclick="cargar(this)">
   <div class="contenedor-foto">
   <img src="/public/images/PUERTA-HIERRO-7.jpg" alt="">
   </div>
    </div>
     <h1 class="background">Catálogo de ventanas</h1>



</section>
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

