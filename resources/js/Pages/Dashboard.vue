<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">PUERTAS ELECTRONICAS</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <select v-model="producto" id="producto">
                    <option value="">Selecciona un producto</option>
                    <option v-for="product in aProductos" :key="product.id" :value="product">{{ product.value }}</option>
                </select>
                <select v-model="material" id="producto">
                    <option value="">Selecciona un producto</option>
                    <option v-for="material in aMateriales" :key="material.id" :value="material">{{ material.value }}</option>
                </select>
                <input type="number" placeholder="ancho" v-model="ancho">
                <input type="number" placeholder="alto" v-model="alto">
                <div class="totals">
                    <div class="detalles">
                        <div class="item">
                            <span>Producto:</span>
                            <small>{{ producto.value }}</small>
                        </div>
                        <div class="item">
                            <span>Material:</span>
                            <small>{{ material.value }}</small>
                        </div>
                        <div class="item">
                            <span>Ancho:</span>
                            <small>{{ ancho }}</small>
                        </div>
                        <div class="item">
                            <span>Alto:</span>
                            <small>{{ alto }}</small>
                        </div>
                    </div>
                    <hr>
                    <div class="item total">
                        <span>
                            Total a pagar
                        </span>
                        <small>${{ totalFor }}</small>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Multiselect from 'vue-multiselect'

export default {

    components: {

        AuthenticatedLayout,
        Head,
        Multiselect,

    },

    data() {
        return {
            producto: '', // Variable para almacenar el producto seleccionado
            aProductos: [{id: 1, value: 'Ventana'}, {id: 2, value: 'Puerta'}], // Opciones disponibles para seleccionar
            material: '', // Variable para almacenar el producto seleccionado
            aMateriales: [{id: 1, value: 'Aluminio'}, {id: 2, value: 'Otro'}],
            ancho: 0,
            alto: 0,
            total: 0
        };
    },

    watch: {
        producto() {
            this.calculototal();
        },

        material() {
            this.calculototal();
        },

        ancho() {
            this.calculototal();
        },

        alto() {
            this.calculototal();
        },
    },

    computed: {
        totalFor() {
            // Formatear el número con puntos de miles
            return this.formatoPuntos(this.total);
        }
    },

    methods: {

        calculototal() {

            if (this.producto.id == 1) {

                this.total = 3000;

                if(this.material.id == 1) {

                    this.total = this.total + (1500 * this.ancho * this.alto);

                }


            }

        },

        formatoPuntos(numero) {
            // Convertir el número a cadena y dividirlo en parte entera y decimal (si lo hay)
            const partes = numero.toString().split('.');
            let parteEntera = partes[0];
            const parteDecimal = partes.length > 1 ? '.' + partes[1] : '';

            // Agregar puntos de miles a la parte entera
            parteEntera = parteEntera.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            // Devolver el número formateado, incluyendo la parte decimal si existe
            return parteEntera + parteDecimal;
        }
    }

}

</script>

<style>
.totals {
    background-color: #fff;
    width: 400px;
    margin: 2rem 0;
    padding: 1rem;
}

.detalles {
    width: 100%;
}

.item {
    width: 100%;
    display: flex;
    justify-content: space-between;
}

hr {
    margin: .5rem 0;
}

.total span {
    font-weight: 600;
}
</style>
