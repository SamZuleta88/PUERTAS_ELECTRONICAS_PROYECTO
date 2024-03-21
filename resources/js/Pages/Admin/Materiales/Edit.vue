<template>
    <AuthenticatedLayout>
      <div class="admin-header">
        <h2>Editar Material</h2>
        <Link :href="route('materiales.index')">
          <button class="admin-header-button">Regresar</button>
        </Link>
      </div>
      <form @submit.prevent="submit">
        <div class="space-y-6">
          <div>
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
          <div>
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
        </div>
        <div class="mt-8">
          <button type="submit" class="update-button">ACTUALIZAR MATERIAL</button>
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
          nombre: '',
          valor: '',
          formula: '',
        }),
      };
    },

    props: {
      materiale: Object,
    },

    mounted() {
      this.form.nombre = this.materiale.nombre;
      this.form.valor = this.materiale.valor;
      this.form.formula = this.materiale.formula;
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
            if (this.form.errors.formula) {
              this.form.reset('formula');
            }
          },
        });
      },
    },
  };
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
</style>