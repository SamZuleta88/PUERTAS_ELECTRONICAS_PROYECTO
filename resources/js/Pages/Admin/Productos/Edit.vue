<template>
    <AuthenticatedLayout>
        <div>
            <h2>Editar Material</h2>
            <Link :href="route('materiales.index')">
                <button class="admin-header-button">Regresar</button>
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
                <label for="imagen" class="basic-fouth-btn">Subir imagen</label>
                <input type="file" id="imagen" name="imagen" hidden @input="form.imagen = $event.target.files[0]"/>
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
                <button type="submit" class="basic-succes-btn">ACTUALIZAR MATERIAL</button>
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
        producto: Object,
        materiales: Object,
    },

    mounted() {
        this.form.nombre = this.producto.nombre;
        this.form.descripcion = this.producto.descripcion;
        this.form.mano_de_obra = this.producto.mano_de_obra;
        this.form.materiales = this.producto.materiales;
    },

    data() {
        return {
            form: useForm({
                nombre: "",
                imagen: null,
                descripcion: null,
                mano_de_obra: null,
                materiales: null,
                _method: 'put',
            })
        };
    },

    methods: {
        submit() {
            this.form.post(route('productos.update', this.producto), this.form, {
                preserveScroll: true,
                forceFormData: true,
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

.basic-fouth-btn {
    padding: 8px 16px;
    background-color: #dc3545; /* Color rojo */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.basic-fouth-btn:hover {
    background-color: #c82333; /* Color rojo oscuro */
}

.basic-succes-btn {
    padding: 8px 16px;
    background-color: #28a745; /* Color verde */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.basic-succes-btn:hover {
    background-color: #218838; /* Color verde oscuro */
}
</style>

