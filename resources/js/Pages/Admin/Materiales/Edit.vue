<template>

    <AuthenticatedLayout>
        <div>
            <h2>Editar Material</h2>
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


            <div class="omt-8">
                <button type="submit" class="basic-succes-btn">ACTAULIZAR MATERIAL</button>
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
            })
        };
    },

    props: {
        materiale: Object
    },

    mounted() {
        this.form.nombre = this.materiale.nombre;
        this.form.valor = this.materiale.valor;
    },

    methods: {

        submit() {
            this.form.put(route('materiales.update', this.materiale), this.form, {
                preserveScroll: true,
                forceFormData: true,
                onSuccess: () => this.form.reset(),
                onError: () => {
                    if (this.form.errors.nombre) {
                        this.form.reset('nombre');
                    }
                    if (this.form.errors.valor) {
                        this.form.reset('valor');
                    }
                },
            });
        },
    },
}

</script>
