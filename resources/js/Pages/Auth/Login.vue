<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="py-4">
            <div class="flex flex-col">
                <div>
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        placeholder="Usuario"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <span class="absolute mr-4 mt-4 place-self-end"
                    ><img
                        class="bg-cover w-6"
                        src="../../../assets/ic-profile_97616.png"
                        alt=""
                    />
                </span>
            </div>
            <div class="flex flex-col mt-4">
                <div>
                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        placeholder="Contraseña"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
                <span class="absolute mr-3 mt-2 place-self-end"
                    ><img
                        class="bg-cover w-8"
                        src="../../../assets/icons8-desbloquear-96.png"
                        alt=""
                    />
                </span>
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex flex-col gap-2 items-center justify-center mt-4">
                <PrimaryButton
                    class="w-44 h-10 justify-center"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Ingresar
                </PrimaryButton>
                <Link
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Recuperar Contraseña
                </Link>
            </div>
        </form>
    </GuestLayout>
</template>
