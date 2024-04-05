<template>
    <AuthenticatedLayout>
        <br><br><br>
        <div class="form-container">
            <div class="form-header">
                <h2 class="form-title">Crear Producto</h2>
                <Link :href="route('productos.index')">
                    <button class="back-button">Regresar</button>
                </Link>
            </div>
            <form @submit.prevent="submit" class="form">
                <div class="form-field">
                    <InputLabel for="nombre" value="Nombre" />
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
                <div class="form-field">
                    <label for="imagen" class="file-upload">Subir imagen</label>
                    <input type="file" id="imagen" name="imagen" hidden @change="form.imagen = $event.target.files[0]"/>
                </div>
                <div class="form-field">
                    <label class="typo__label">Materiale(s) *</label>
                    <multiselect
                        v-model="form.materiales"
                        tag-placeholder="Agregar nuevo tag"
                        placeholder="Buscar o agregar un tag"
                        label="nombre" track-by="id"
                        :options="materiales"
                        :multiple="true"
                        :taggable="true">
                    </multiselect>
                </div>
                <div class="form-field">
                    <InputLabel for="descripcion" value="Descripcion" />
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
                <div class="form-field">
                    <InputLabel for="mano_de_obra" value="Mano de obra" />
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
                <div>
                    <button type="submit" class="submit-button">CREAR PRODUCTO</button>
                </div>
            </form>
        </div>
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

<style scoped>
.form-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    border: 1px solid #ccc;
}
.form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.form-title {
    margin: 0;
    font-size: 24px;
    color: #333;
}
.back-button {
    padding: 8px 16px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}
.back-button:hover {
    background-color: #0056b3;
}
.form {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.form-field {
    margin-bottom: 20px;
    width: 100%;
}
.typo__label {
    margin-bottom: 8px;
    color: #333;
    font-weight: bold;
    font-size: 14px;
}
.file-upload {
    padding: 8px 16px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}
.file-upload:hover {
    background-color: #0056b3;
}
.submit-button {
    padding: 8px 16px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}
.submit-button:hover {
    background-color: #218838;
}
</style>
