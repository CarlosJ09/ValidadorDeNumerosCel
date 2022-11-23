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
            method="POST"
            v-on:submit.prevent="submitUser()"
            action="{{route('login')}}"
        >
            <div class="flex items-center mt-8">
                <input
                    type="text"
                    class="border-2 rounded-xl border-gray-700 p-2 w-64"
                    name="login"
                    placeholder="Usuario"
                    v-model="user.email"
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
                <!-- <span
                    class="text-sm absolute text-red-700"
                    v-if="v$.email.$error"
                    >{{ v$.email.$errors[0].$message }}</span
                > -->
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
                    <div class="flex justify-center">
                        <!--  <span
                            class="text-sm absolute text-red-700 text-center"
                            v-if="v$.email.$error"
                            >{{ v$.password.$errors[0].$message }}
                        </span> -->
                    </div>
                </div>
            </div>

            <button
                class="bg-slate-800 mt-6 text-center rounded-2xl w-48 py-2 text-white font-bold hover:bg-slate-700"
                type="submit"
            >
                Ingresar
            </button>

            <router-link
                class="text-center text-sm text-gray-600 mt-2 hover:text-gray-400"
                to="/Create"
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

<script>
import { useVuelidate } from "@vuelidate/core";
import { required, email, minLength } from "@vuelidate/validators";
import { reactive, computed } from "vue";
import axios from "axios";

//Validacion de Formulario
export default {
    name: "Form",
    data() {
        return {
            user: {
                email: "",
                password: "",
            },
        };
    },
    components: {},
    methods: {
        submitUser() {
            axios
                .post("/Login", this.user)
                .then((response) => {
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error.response);
                });
        },
    },
    /*  setup() {
        const state = reactive({
            email: "",
            password: "",
        });

        const rules = computed(() => {
            return {
                email: { required, email },
                password: {
                    required,
                    minLength: minLength(6),
                },
            };
        });

        const v$ = useVuelidate(rules, state);

        return {
            state,
            v$,
        };
    }, */
};
</script>
