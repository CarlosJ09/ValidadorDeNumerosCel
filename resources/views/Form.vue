<script setup>
import { reactive, ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();

//Validacion de Formulario

let form = reactive({
    email: "",
    password: "",
});

let error = ref("");

const login = async () => {
    await axios.post("api/login", form)
    .then((response) => {
        if (response.data.success) {
            localStorage.setItem("token", response.data.data.token);
            router.push("/Home");
        } else {
            error.value = response.data.message;
        }
    });
};
</script>

<template>
    <div
        class="flex flex-col justify-center items-center bg-sky-600 w-screen h-screen"
    >
        <div class="fixed flex mb-80 w-44 h-auto">
            <img
                class="bg-white bg-cover border-4 p-2 border-gray-600 rounded-2xl text-center"
                src="../assets/sendIU.png"
                alt=""
            />
        </div>
        <form
            class="flex flex-col justify-center items-center bg-white border-4 rounded-2xl border-gray-600 py-10 pb-8 px-24"
            @submit.prevent="login"
        >
            <div class="flex items-center mt-8">
                <input
                    type="email"
                    class="border-2 rounded-xl border-gray-700 p-2 w-64"
                    name="login"
                    placeholder="Usuario"
                    v-model="form.email"
                    required
                />
                <span class="fixed" style="margin-left: 210px"
                    ><img
                        class="bg-cover w-6"
                        src="../assets/ic-profile_97616.png"
                        alt=""
                /></span>
            </div>
            <div class="flex justify-center text-center">
                <span class="text-sm absolute text-red-700" v-if="error">{{
                    error
                }}</span>
            </div>
            <div class="flex my-2 items-center mt-6">
                <div>
                    <div class="flex items-center">
                        <input
                            type="password"
                            class="border-2 rounded-xl border-gray-700 p-2 w-64"
                            name="login"
                            placeholder="Contraseña"
                            v-model="form.password"
                            required
                        />
                        <span class="fixed ml-52"
                            ><img
                                class="bg-cover w-8"
                                src="../assets/icons8-desbloquear-96.png"
                                alt=""
                        /></span>
                    </div>
                    <div class="flex justify-center">
                        <span
                            class="text-sm absolute text-red-700 text-center"
                            v-if="error"
                            >{{ error }}
                        </span>
                    </div>
                </div>
            </div>

            <input
                class="bg-slate-800 mt-6 text-center rounded-2xl w-48 py-2 text-white font-bold hover:bg-slate-700 cursor-pointer"
                type="submit"
                value="Ingresar"
            />

            <router-link
                class="text-center text-sm text-gray-600 mt-2 hover:text-gray-400"
                to="/Register"
                >Registrarse
            </router-link>
            <router-link
                class="text-center text-sm text-gray-600 mt-2 hover:text-gray-400"
                to="/Home"
                >Recuperar Contraseña
            </router-link>
        </form>
    </div>
</template>
