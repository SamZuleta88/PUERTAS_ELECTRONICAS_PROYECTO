<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="bg-primary-dark text-white p-4 rounded-lg mb-4">
                <h2 class="font-bold text-2xl leading-tight text-yellow-500">MIS COTIZACIONES</h2>
            </div>
        </template>

        <div class="py-12">
            <table>
                <thead>
                    <th>id</th>
                    <th>Producto</th>
                    <th>Ancho</th>
                    <th>Alto</th>
                    <th>Total</th>
                    <th>Detalles</th>
                    <th>PDF</th>
                    <th>actions</th>
                </thead>
                <tbody>
                    <tr v-for="cotizacion in cotizaciones">
                        <td>{{ cotizacion.id }}</td>
                        <td>{{ cotizacion.producto.nombre }}</td>
                        <td>{{ cotizacion.ancho }} m</td>
                        <td>{{ cotizacion.alto }} m</td>
                        <td><b>${{ formatoPuntos(cotizacion.total) }}</b></td>
                        <td>
                            <ul>
                                <ol v-for="detalle in cotizacion.detalles">{{ detalle.material }}: <b>${{ formatoPuntos(detalle.total) }}</b></ol>
                            </ul>
                        </td>
                        <td><a :href="route('cotizacion.pdf',cotizacion)">Descargar PDF</a></td>
                        <td>
                        <div class="button-container">
                            <button @click="eliminarCotizacion(cotizacion)" class="delete-button">Eliminar</button>
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Inertia } from "@inertiajs/inertia"

export default {
    components: {
        AuthenticatedLayout,
        Head,
    },

    props: {
        cotizaciones: Object,
    },

    methods: {

        formatoPuntos(numero) {
            const partes = numero.toString().split('.');
            let parteEntera = partes[0];
            parteEntera = parteEntera.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            return parteEntera;
        },

        eliminarCotizacion(cotizacion){
            alert('Estas seguro de elimar esta cotizacion?');
            Inertia.delete(route('cotizaciones.destroy', cotizacion), {
                preserveScroll: true,
                preserveState: true,
            });
        },

    }

}

</script>

<style>
.text-primary {
    color: #f44242;
}

.text-secondary {
    color: #ffd736;
}

.border-secondary {
    border-color: #FFDE59;
}

.font-semibold {
    font-weight: 600;
}

.rounded-lg {
    border-radius: 0.5rem;
}

:focus {
    outline: none;
    box-shadow: 0 0 0 2px #80B9FF;
}

.bg-primary-dark {
    background-color: #03509c; /* Azul oscuro *//* Azul oscuro *//* Azul oscuro */
}

.bg-primary-light {
    background-color: #80B9FF; /* Azul */
}
</style>

