<template>
    <Head title="Welcome" />

    <Qouter></Qouter>
    <footer>
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    >Register</Link
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
