<template>

    <AuthenticatedLayout>
        <div class="admin-header">
            <h2>MATERIALES</h2>
            <Link :href="route('materiales.create')">
                <button>CREAR MATERIAL</button>
            </Link>
        </div>

        <table>
            <thead>
                <th>id</th>
                <th>name</th>
                <th>valor</th>
                <th>formula</th>
                <th>actions</th>
            </thead>
            <tbody>
                <tr v-for="material in materiales">
                    <td>{{ material.id }}</td>
                    <td>{{ material.nombre }}</td>
                    <td>{{ material.valor }}</td>
                    <td>{{ material.formula }}</td>
                    <td>
                    <div class="button-container">
                        <Link :href="route('materiales.edit', material)">
                            <button class="edit-button">Editar</button>
                        </Link>
                        <button @click="eliminarMaterial(material)" class="delete-button">Eliminar</button>
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
import { Inertia } from "@inertiajs/inertia"

export default {

    components: {
        AuthenticatedLayout,
        Link,
    },

    props: {
        materiales: Object
    },

    methods: {
        eliminarMaterial(material){
            Inertia.delete(route('materiales.destroy', material), {
                preserveScroll: true,
                preserveState: true,
            });
        },
    },
}

</script>

