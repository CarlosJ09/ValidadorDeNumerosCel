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
                    name="name"
                    placeholder="Usuario"
                    v-model="state.name"
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
                            type="text"
                            class="border-2 rounded-xl border-gray-700 p-2 w-64"
                            name="email"
                            placeholder="Email"
                            v-model="state.email"
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
            <div class="flex justify-center text-center">
                <span
                    class="text-sm absolute text-red-700"
                    v-if="v$.email.$error"
                >
                    Favor introducir un email valido
                </span>
            </div>

            <div class="flex my-2 items-center mt-6">
                <div>
                    <div class="flex items-center">
                        <input
                            type="password"
                            class="border-2 rounded-xl border-gray-700 p-2 w-64"
                            name="password"
                            placeholder="Contraseña"
                            v-model="state.password"
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
            <div class="flex justify-center text-center">
                <span
                    class="text-sm absolute text-red-700"
                    v-if="v$.password.$error"
                >
                    Favor introducir una contraseña valida
                </span>
            </div>

            <div class="flex my-2 items-center mt-6">
                <div>
                    <div class="flex items-center">
                        <input
                            type="password"
                            class="border-2 rounded-xl border-gray-700 p-2 w-64"
                            name="company"
                            placeholder="Confirmar Contraseña"
                            v-model="state.confirm"
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
            <div class="flex justify-center text-center">
                <span
                    class="text-sm absolute text-red-700"
                    v-if="v$.confirm.$error"
                >
                    Las contraseñas deben ser iguales
                </span>
            </div>

            <div class="flex my-2 items-center mt-6">
                <div>
                    <div class="flex items-center">
                        <input
                            type="text"
                            class="border-2 rounded-xl border-gray-700 p-2 w-64"
                            name="confirmPassword"
                            placeholder="Compañia (Opcional)"
                            v-model="state.company"
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
import { useVuelidate } from "@vuelidate/core";
import { required, email, sameAs, minLength } from "@vuelidate/validators";
import { reactive } from "vue";

//Validacion de Formulario
export default {
    name: "Register",
    components: {},
    setup() {
        const state = reactive({
            name: "",
            email: "",
            password: "",
            confirm: "",
            company: "",
        });
        const rules = {
            name: { required },
            email: { required, email },
            password: { required, minLength: minLength(6) },
            confirm: {
                required,
                minLength: minLength(6),
                /* sameAs: sameAs(state.password), */
            },
        };

        const v$ = useVuelidate(rules, state);

        return { state, v$ };
    },
    methods: {
        submitUser() {
            this.v$.$validate();
            if (!this.v$.$error) {
                axios
                    .post("api/register", this.state)
                    .then((response) => {
                        console.log(response);
                    })
                    .catch((error) => {
                        console.log(error.response);
                    });
            } else {
                console.log(this.v$.$errors);
            }
        },
    },
};
</script>
