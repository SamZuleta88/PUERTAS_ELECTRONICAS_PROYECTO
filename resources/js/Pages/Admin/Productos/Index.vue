<template>

    <AuthenticatedLayout>
        <div class="admin-header">
            <h2>PRODUCTOS</h2>
            <Link :href="route('productos.create')">
                <button class="basic-succes-btn">Crear Producto</button>
            </Link>
        </div>

        <table>
            <thead>
                <th>id</th>
                <th>Nombre</th>
                <th>imagen</th>
                <th>descripcion</th>
                <th>materiales</th>
                <th>actions</th>
            </thead>
            <tbody>
                <tr v-for="producto in productos">
                    <td>{{ producto.id }}</td>
                    <td>{{ producto.name }}</td>
                    <td>
                        <div class="portrait">
                            <img v-if="producto.imagen" :src="producto.imagen" alt="producto Logo" width="50px" height="50px" class="m-auto" />
                        </div>
                    </td>
                    <td>{{ producto.descripcion }}</td>
                    <td>
                        <ul>
                            <li v-for="material in producto.materiales">{{ material.nombre }}</li>
                        </ul>
                    </td>
                    <td>
                        <div class="button-container">
                            <Link :href="route('productos.edit', producto)">
                                <button class="edit-button">Editar</button>
                            </Link>
                            <button @click="deleteProducto(producto)" class="delete-button">Eliminar</button>
                        </div>
                    </td>
                 </tr>
            </tbody>
        </table>

    </AuthenticatedLayout>

</template>

<script>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';
import { Inertia } from "@inertiajs/inertia";

export default {

    components: {
        AuthenticatedLayout,
        Link,
    },

    props: {
        productos: Object
    },

    data() {
        return {
            search: '',
        };
    },

    watch: {

    },

    methods: {
        deleteProducto(producto){
            Inertia.delete(route('productos.destroy', producto), {
                preserveScroll: true,
                preserveState: true,
            });
        },
    },
}

</script>

<style>
.portrait {
    width: 100px;
    height: 100px;
    overflow: hidden;
}
</style>
