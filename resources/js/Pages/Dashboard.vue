<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="bg-primary-dark text-white p-4 rounded-lg mb-4">
                <h2 class="font-bold text-2xl leading-tight text-secondary">PUERTAS ELECTRÓNICAS</h2>
                <h6 class="font-bold text-lg leading-tight">Fabricamos - Instalamos - Automatizamos.</h6>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col gap-4">
                    <div class="flex gap-4">
                        <div>
                            <label for="producto" class="block font-semibold text-sm text-gray-700">Producto</label>
                            <select v-model="producto" id="producto" class="block w-full mt-1 border border-secondary rounded-lg focus:outline-none focus:ring focus:border-primary">
                                <option value="">Selecciona un producto</option>
                                <option v-for="product in aProductos" :key="product.id" :value="product">{{ product.value }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="material" class="block font-semibold text-sm text-gray-700">Material</label>
                            <select v-model="material" id="material" class="block w-full mt-1 border border-secondary rounded-lg focus:outline-none focus:ring focus:border-primary">
                                <option value="">Selecciona un material</option>
                                <option v-for="material in aMateriales" :key="material.id" :value="material">{{ material.value }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="ancho" class="block font-semibold text-sm text-gray-700">Ancho</label>
                            <input type="number" v-model="ancho" id="ancho" placeholder="Ancho" class="block w-full mt-1 border border-secondary rounded-lg focus:outline-none focus:ring focus:border-primary">
                        </div>
                        <div>
                            <label for="alto" class="block font-semibold text-sm text-gray-700">Alto</label>
                            <input type="number" v-model="alto" id="alto" placeholder="Alto" class="block w-full mt-1 border border-secondary rounded-lg focus:outline-none focus:ring focus:border-primary">
                        </div>
                    </div>
                    <div class="bg-primary-light text-white p-4 rounded-lg shadow-md">
                        <div class="text-lg font-semibold mb-4">Detalles del pedido</div>
                        <div class="flex justify-between">
                            <div>Producto:</div>
                            <div>{{ producto.value }}</div>
                        </div>
                        <div class="flex justify-between">
                            <div>Material:</div>
                            <div>{{ material.value }}</div>
                        </div>
                        <div class="flex justify-between">
                            <div>Ancho:</div>
                            <div>{{ ancho }}</div>
                        </div>
                        <div class="flex justify-between">
                            <div>Alto:</div>
                            <div>{{ alto }}</div>
                        </div>
                        <hr class="my-4">
                        <div class="flex justify-between">
                            <div class="font-semibold">Total a pagar:</div>
                            <div class="font-semibold">${{ totalFor }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

export default {
    components: {
        AuthenticatedLayout,
        Head,
    },

    data() {
        return {
            producto: '',
            aProductos: [{id: 1, value: 'Ventana'}, {id: 2, value: 'Puerta'}],
            material: '',
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
            return this.formatoPuntos(this.total);
        }
    },

    methods: {
        calculototal() {
            if (this.producto.id == 1) {
                this.total = 3000;
                if (this.material.id == 1) {
                    this.total = this.total + (1500 * this.ancho * this.alto);
                }
            }
        },

        formatoPuntos(numero) {
            const partes = numero.toString().split('.');
            let parteEntera = partes[0];
            const parteDecimal = partes.length > 1 ? '.' + partes[1] : '';
            parteEntera = parteEntera.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            return parteEntera + parteDecimal;
        }
    }
}
</script>

<style>
.text-primary {
    color: #000000;
}

.text-secondary {
    color: #FFDE59;
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
    background-color: #03509c; /* Azul oscuro */
}

.bg-primary-light {
    background-color: #80B9FF; /* Azul */
}
</style>
