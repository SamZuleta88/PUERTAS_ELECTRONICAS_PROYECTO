<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="bg-primary-dark text-white p-4 rounded-lg mb-4">
                <h2 class="font-bold text-2xl leading-tight text-yellow-500">PUERTAS ELECTRÓNICAS</h2>
                <h6 class="font-bold text-lg leading-tight">Fabricamos - Instalamos - Automatizamos.</h6>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col gap-4">
                    <div class="flex gap-4">
                        <div>
                            <label for="producto" class="block font-semibold text-sm text-gray-700">Producto</label>
                            <select v-model="form.producto" id="producto" class="block w-full mt-1 border border-secondary rounded-lg focus:outline-none focus:ring focus:border-primary">
                                <option value="">Selecciona un producto</option>
                                <option v-for="producto in productos" :key="producto.id" :value="producto">{{ producto.nombre }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="ancho" class="block font-semibold text-sm text-gray-700">Ancho</label>
                            <input type="number" v-model="form.ancho" id="ancho" placeholder="Ancho" class="block w-full mt-1 border border-secondary rounded-lg focus:outline-none focus:ring focus:border-primary">
                        </div>
                        <div>
                            <label for="alto" class="block font-semibold text-sm text-gray-700">Alto</label>
                            <input type="number" v-model="form.alto" id="alto" placeholder="Alto" class="block w-full mt-1 border border-secondary rounded-lg focus:outline-none focus:ring focus:border-primary">
                        </div>
                        <button @click="calcularTotales()">Cotizar</button>
                    </div>

                    <div class="bg-primary-light text-white p-4 rounded-lg shadow-md">
                        <div class="text-lg font-semibold mb-4">Detalles del pedido</div>
                        <div class="flex justify-between" v-if="form.producto">
                            <div>Producto:</div>
                            <div>{{ form.producto.nombre }}</div>
                        </div>
                        <div class="flex justify-between">
                            <div>Ancho:</div>
                            <div>{{ form.ancho }} m</div>
                        </div>
                        <div class="flex justify-between">
                            <div>Alto:</div>
                            <div>{{ form.alto }} m</div>
                        </div>
                        <div class="flex justify-between" v-for="detalle in form.detalles">
                            <div>{{ detalle.material }} : {{ detalle.formula }}</div>
                            <div>$ {{ formatoPuntos(detalle.total) }}</div>
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
import { useForm } from '@inertiajs/vue3';

export default {
    components: {
        AuthenticatedLayout,
        Head,
    },

    data() {
        return {

            form: useForm({
                producto: '',
                ancho: 0,
                alto: 0,
                total: 0,
                detalles: [],
            })
        };
    },

    props: {
        productos: Object,
    },

    computed: {
        totalFor() {
            return this.formatoPuntos(this.form.total);
        }
    },

    methods: {

        formatoPuntos(numero) {
            const partes = numero.toString().split('.');
            let parteEntera = partes[0];
            parteEntera = parteEntera.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            return parteEntera;
        },

        calcularTotales() {

            this.form.detalles = [];
            this.form.total = 0;

            if (this.form.producto) {

                const A = this.form.ancho;
                const B = this.form.alto;

                this.form.producto.materiales.forEach(element => {

                    const totalMaterialValor = element.valor * eval(element.formula);

                    this.form.total += totalMaterialValor;

                    this.form.detalles.push(
                        {
                            material: element.nombre,
                            formula: `${element.valor} * ${element.formula}`,
                            total: totalMaterialValor,
                        }
                    )

                });

                const manoDeObra = this.form.total * (this.form.producto.mano_de_obra / 100);

                this.form.detalles.push(
                    {
                        material: 'Mano de Obra',
                        formula: `${this.form.total} * ${this.form.producto.mano_de_obra} %`,
                        total: manoDeObra,
                    }
                )

                this.form.total += manoDeObra

            }

        }
    }
}
</script>

<style scoped>

.logo {
        width: 100%; /* Ajusta el ancho de la imagen según sea necesario */
        height: 100%; /* Mantiene la proporción de aspecto */
      }
      
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
    background-color: #03509c; /* Azul oscuro */
}

.bg-primary-light {
    background-color: #80B9FF; /* Azul */
}
</style>
