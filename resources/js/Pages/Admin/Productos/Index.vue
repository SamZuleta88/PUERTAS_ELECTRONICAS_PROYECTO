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
                    <td>{{ producto.nombre }}</td>
                    <td>
                        <div class="portrait">
                            <img v-if="producto.imagen" :src="producto.imagen" alt="producto Logo" width="100px" height="100px" class="m-auto" />
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
/* Encabezado */
.admin-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #f2f2f2;
    border-bottom: 1px solid #ccc;
}

.admin-header h2 {
    margin: 0;
    font-size: 24px;
}

.admin-header button {
    padding: 8px 16px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.admin-header button:hover {
    background-color: #0056b3;
}

/* Tabla */
table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #f0f0f0;
}

/* Botones */
.button-container {
    display: flex;
    align-items: center;
}

.edit-button,
.delete-button {
    padding: 8px 16px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 5px;
    transition: background-color 0.3s;
}

.edit-button:hover,
.delete-button:hover {
    background-color: #0056b3;
}

.portrait {
    width: 100px;
    height: 100px;
    overflow: hidden;
}

</style>


