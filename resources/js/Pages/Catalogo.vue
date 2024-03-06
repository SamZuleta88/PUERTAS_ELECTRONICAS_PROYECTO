<template>
    <div>
        <h1 class="background">Catálogo de productos</h1>
        <ul>
            <li v-for="producto in productos" :key="producto.id">{{ producto.nombre }}</li>
        </ul>
    </div>
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

