<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import Multiselect from "@vueform/multiselect";

const form = useForm({
    role: "",
    permissions: [],
    terms: false,
});

const submit = () => {
    form.post(route("role.store"), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-sky-600"
    >
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <Head title="Register" />

            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="name" value="Nombre del Rol" />

                    <TextInput
                        id="rol"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.role"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Permisos" />

                    <Multiselect
                        v-model="value"
                        :options="options"
                        mode="tags"
                        :close-on-select="false"
                    />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link
                        :href="route('role.index')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Volver
                    </Link>

                    <PrimaryButton
                        class="ml-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        :searchable="true"
                        :create-option="true"
                    >
                        Crear
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    components: {
        Multiselect,
    },
    data() {
        return {
            value: [],
            options: [
                { value: "Crear", label: "Crear" },
                { value: "Eliminar", label: "Eliminar" },
                { value: "Listar", label: "Listar" },
                { value: "VisualizarReportes", label: "VisualizarReportes" },
                { value: "CrearReportes", label: "CrearReportes" },
            ],
        };
    },
};
</script>

<style src="@vueform/multiselect/themes/default.css"></style>
