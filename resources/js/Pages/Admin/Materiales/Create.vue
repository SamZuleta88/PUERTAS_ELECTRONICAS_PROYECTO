<template>

    <AuthenticatedLayout>
        <div>
            <h2>Crear Material</h2>
            <Link :href="route('materiales.index')">
                <button>Regresar</button>
            </Link>
        </div>
        <form @submit.prevent="submit">
            <div class="space-y-6">
                <div>
                    <InputLabel for="nombre" value="nombre" />

                    <TextInput
                        id="nombre"
                        ref="nombreInput"
                        v-model="form.nombre"
                        type="text"
                        class="block w-full"
                        autocomplete="nombre-input"
                    />

                    <InputError :message="form.errors.nombre" class="mt-2" />
                </div>

            </div>

            <div class="space-y-6">
                <div>
                    <InputLabel for="valor" value="valor" />

                    <TextInput
                        id="valor"
                        ref="valorInput"
                        v-model="form.valor"
                        type="text"
                        class="block w-full"
                        autocomplete="valor-input"
                    />

                    <InputError :message="form.errors.valor" class="mt-2" />
                </div>

            </div>

            <p>

                El Ancho se representa con una <b>A</b>
                El Alto se representa con una  <b>B</b>

            </p>
            <div class="space-y-6">
                <div>
                    <InputLabel for="formula" value="Formula del matrial segun el metraje" />

                    <TextInput
                        id="formula"
                        ref="formulaInput"
                        v-model="form.formula"
                        type="text"
                        class="block w-full"
                        autocomplete="formula-input"
                    />

                    <InputError :message="form.errors.formula" class="mt-2" />
                </div>

            </div>

            <div class="omt-8">
                <button type="submit" class="basic-succes-btn">CREAR MATERIAL</button>
            </div>
        </form>
    </AuthenticatedLayout>

</template>

<script>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

export default {

    components: {
        AuthenticatedLayout,
        Link,
        InputError,
        InputLabel,
        TextInput,
    },

    data() {
        return {
            form: useForm({
                nombre: "",
                valor: "",
                formula: "",
            })
        };
    },

    methods: {
        submit() {
            this.form.post(route('materiales.store'), {
                preserveScroll: true,
                onSuccess: () => this.form.reset(),
                onError: () => {
                    if (this.form.errors.nombre) {
                        this.form.reset('nombre');
                    }
                    if (this.form.errors.valor) {
                        this.form.reset('valor');
                    }
                    if (this.form.errors.formula) {
                        this.form.reset('formula');
                    }
                },
            });
        },
    },
}

</script>
