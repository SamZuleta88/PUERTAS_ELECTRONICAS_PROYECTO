<template>
    <div>
        <h1 class="background">Cotizaciones</h1>
        <ul>
            <li v-for="producto in productos" :key="producto.id">{{ producto.nombre }}</li>
        </ul>
    </div>
</template>

<script>

export default {


    data() {
        return {
        };
    },
}

</script>

