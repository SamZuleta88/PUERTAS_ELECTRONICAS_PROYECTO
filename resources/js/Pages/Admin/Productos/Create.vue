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
            <div class="my-4 mt-6">
                <label for="imagen" class="basic-fouth-btn ">SUbir imagen</label>
                <input type="file" id="imagen" name="imagen" hidden
                    @input="form.imagen = $event.target.files[0]"/>
            </div>
            <div class="space-y-6">
                <label class="typo__label">Materiale(s) *</label>
                <multiselect
                    v-model="form.materiales"
                    tag-placeholder="Add this as new tag"
                    placeholder="Search or add a tag"
                    label="nombre" track-by="id"
                    :options="materiales"
                    :multiple="true"
                    :taggable="true">
                </multiselect>
            </div>
            <div class="space-y-6">
                <div>
                    <InputLabel for="descripcion" value="descripcion" />

                    <TextInput
                        id="descripcion"
                        ref="descripcionInput"
                        v-model="form.descripcion"
                        type="text"
                        class="block w-full"
                        autocomplete="descripcion-input"
                    />

                    <InputError :message="form.errors.descripcion" class="mt-2" />
                </div>
            </div>
            <div class="space-y-6">
                <div>
                    <InputLabel for="mano_de_obra" value="mano_de_obra" />

                    <TextInput
                        id="mano_de_obra"
                        ref="mano_de_obraInput"
                        v-model="form.mano_de_obra"
                        type="text"
                        class="block w-full"
                        autocomplete="mano_de_obra-input"
                    />

                    <InputError :message="form.errors.mano_de_obra" class="mt-2" />
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
import Multiselect from 'vue-multiselect'
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
        Multiselect,
    },

    props: {
        materiales: Object,
    },

    data() {
        return {
            form: useForm({
                nombre: "",
                imagen: null,
                descripcion: null,
                mano_de_obra: null,
                materiales: null,
            })
        };
    },

    methods: {
        submit() {
            this.form.post(route('productos.store'), {
                preserveScroll: true,
                onSuccess: () => this.form.reset(),
                onError: () => {
                    if (this.form.errors.nombre) {
                        this.form.reset('nombre');
                    }
                    if (this.form.errors.imagen) {
                        this.form.reset('imagen');
                    }
                    if (this.form.errors.descripcion) {
                        this.form.reset('descripcion');
                    }
                    if (this.form.errors.mano_de_obra) {
                        this.form.reset('mano_de_obra');
                    }
                    if (this.form.errors.materiales) {
                        this.form.reset('materiales');
                    }
                },
            });
        },
    },
}

</script>
