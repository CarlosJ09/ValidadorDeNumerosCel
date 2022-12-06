<template>
    <div
        class="flex flex-col justify-center items-center bg-sky-600 w-screen h-screen"
    >
        <div class="fixed flex w-44 h-auto" style="margin-bottom: 32rem">
            <img
                class="bg-white bg-cover border-4 p-2 border-gray-600 rounded-2xl text-center"
                src="../assets/sendIU.png"
                alt=""
            />
        </div>
        <form
            class="flex flex-col justify-center items-center bg-white border-4 rounded-2xl border-gray-600 py-10 pb-8 px-24 mt-6"
            method="POST"
            v-on:submit.prevent="submitUser()"
        >
            <div class="flex items-center mt-8">
                <input
                    type="text"
                    class="border-2 rounded-xl border-gray-700 p-2 w-64"
                    name="login"
                    placeholder="Usuario"
                    v-model="user.name"
                    required
                />
                <span class="fixed" style="margin-left: 210px"
                    ><img
                        class="bg-cover w-6"
                        src="../assets/ic-profile_97616.png"
                        alt=""
                /></span>
            </div>
            <div class="flex justify-center text-center"></div>
            <div class="flex my-2 items-center mt-6">
                <div>
                    <div class="flex items-center">
                        <input
                            type="email"
                            class="border-2 rounded-xl border-gray-700 p-2 w-64"
                            name="login"
                            placeholder="Email"
                            v-model="user.email"
                            required
                        />
                        <span class="fixed ml-52"
                            ><img
                                class="bg-cover w-8"
                                src="../assets/email.png"
                                alt=""
                        /></span>
                    </div>
                </div>
            </div>

            <div class="flex my-2 items-center mt-6">
                <div>
                    <div class="flex items-center">
                        <input
                            type="password"
                            class="border-2 rounded-xl border-gray-700 p-2 w-64"
                            name="login"
                            placeholder="Contraseña"
                            v-model="user.password"
                            required
                        />
                        <span class="fixed ml-52"
                            ><img
                                class="bg-cover w-8"
                                src="../assets/icons8-desbloquear-96.png"
                                alt=""
                        /></span>
                    </div>
                </div>
            </div>

            <div class="flex my-2 items-center mt-6">
                <div>
                    <div class="flex items-center">
                        <input
                            type="password"
                            class="border-2 rounded-xl border-gray-700 p-2 w-64"
                            name="login"
                            placeholder="Confirmar Contraseña"
                            v-model="user.c_password"
                            required
                        />
                        <span class="fixed ml-52"
                            ><img
                                class="bg-cover w-8"
                                src="../assets/icons8-desbloquear-96.png"
                                alt=""
                        /></span>
                    </div>
                </div>
            </div>

            <div class="flex my-2 items-center mt-6">
                <div>
                    <div class="flex items-center">
                        <input
                            type="text"
                            class="border-2 rounded-xl border-gray-700 p-2 w-64"
                            name="login"
                            placeholder="Compañia"
                            v-model="user.company"
                            required
                        />
                        <span class="fixed ml-52"
                            ><img
                                class="bg-cover w-8"
                                src="../assets/company.png"
                                alt=""
                        /></span>
                    </div>
                </div>
            </div>

            <button
                class="bg-slate-800 mt-6 text-center rounded-2xl w-48 py-2 text-white font-bold hover:bg-slate-700"
                type="submit"
            >
                Registrarse
            </button>
            <router-link
                class="text-center text-sm text-gray-600 mt-2 hover:text-gray-400"
                to="/"
                >Volver al Login
            </router-link>
        </form>
    </div>
</template>

<script>
import axios from "axios";

//Validacion de Formulario
export default {
    name: "Register",
    components: {},
    data() {
        return {
            user: {
                name: "",
                email: "",
                password: "",
                c_password: "",
                company: "",
            },
        };
    },
    methods: {
        submitUser() {
            axios
                .post("api/register", this.user)
                .then((response) => {
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error.response);
                });
        },
    },
};
</script>
