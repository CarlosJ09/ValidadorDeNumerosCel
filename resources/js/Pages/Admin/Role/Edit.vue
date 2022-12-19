<script setup>

import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    role: {
        type: Object,
    },
});


const form = useForm(props.role);

</script>

<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-sky-600"
    >
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <Head title="Register" />

            <form @submit.prevent="form.put(route('role.update', form.id))">
                <div>
                    <InputLabel for="name" value="Nombre del Rol" />

                    <TextInput
                        name="role"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Permisos" />

                    <select
                        multiple
                        name="permisos"
                        class="mt-1 block w-full"
                        required
                        size="3"
                    >
                        <option value="">crear</option>
                        <option value="">editar</option>
                        <option value="">eliminar</option>
                        <option value="">Guardar</option>
                        <option value="">Listar</option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.email" />
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
                    >
                       Guardar
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>
