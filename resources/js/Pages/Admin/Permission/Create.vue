<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    permission: "",
    terms: false,
});

const submit = () => {
    form.post(route("permission.store"), {
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
                    <InputLabel for="name" value="Nombre del Permiso" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.permission"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link
                        :href="route('permission.index')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Volver
                    </Link>

                    <PrimaryButton
                        class="ml-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Crear
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>
