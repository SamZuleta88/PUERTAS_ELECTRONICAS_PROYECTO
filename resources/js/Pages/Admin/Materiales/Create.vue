<template>
    <AuthenticatedLayout>
        <br>
        <br>
        <br>
        <div class="form-container">
            <div class="form-header">
                <h2 class="form-title">Crear Material</h2>
                <Link :href="route('materiales.index')">
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
                    <InputLabel for="valor" value="Valor" />
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
                <div class="form-field">
                    <InputLabel for="formula" value="Formula del material segun el metraje" />
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
                <p class="form-hint">
                    El Ancho se representa con una <b>A</b>
                    El Alto se representa con una <b>B</b>
                </p>
                <br>
                <div>
                    <button type="submit" class="submit-button">CREAR MATERIAL</button>
                </div>
            </form>
        </div>
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
.form-hint {
    margin-top: 10px;
    color: #666;
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
