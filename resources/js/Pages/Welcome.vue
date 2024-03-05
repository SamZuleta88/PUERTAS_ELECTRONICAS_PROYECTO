<template>
    <Head title="HOME" />

    <Qouter></Qouter>
    <Link
        :href="route('product.crear')"
            >PUERTAS ELECTRÓNICAS</Link>
    <footer>
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                >COTIZADOR</Link
            >
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                >COTIZACIONES</Link
            >
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                >CATALOGO</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    >INICIAR SESIÓN </Link
                >
<BR></BR>
                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    >REGISTRARSE</Link
                >
            </template>
        </div>
    </footer>
</template>

<script setup>

import { defineComponent } from 'vue';
import Qouter from './components/Qouter.vue'
import { Head, Link } from '@inertiajs/vue3';

defineComponent({
    Qouter,
})

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>
