<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="bg-primary-dark text-white p-4 rounded-lg mb-4">
                <h2 class="font-bold text-2xl leading-tight text-yellow-500">MIS COTIZACIONES</h2>
            </div>
        </template>

        <div class="py-12">
            {{ cotizaciones }}
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

    props: {
        cotizaciones: Object,
    },

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
    background-color: #03509c; /* Azul oscuro */
}

.bg-primary-light {
    background-color: #80B9FF; /* Azul */
}
</style>
