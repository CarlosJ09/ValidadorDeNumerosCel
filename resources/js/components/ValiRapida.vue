<template>
    <div
        class="flex flex-wrap gap-4 bg-white justify-between items-center p-6 border border-gray-800"
    >
        <div class="flex flex-col justify-start">
            <div class="flex items-center mb-4">
                <span><img src="../../assets/check.png" alt="" /></span>
                <h2 class="text-2xl ml-2">Validación Telefónico</h2>
            </div>
            <p class="ml-4 text-md mb-2">Ingrese el numero que desea validar</p>
            <div class="flex items-center">
                <input
                    id="numero"
                    type="text"
                    class="border border-black mx-4 rounded-lg p-1"
                    v-model="Phone"
                    placeholder="ej: 829-405-2748"
                    @change="Validar($event)"
                />
                <button
                    class="bg-slate-800 text-white px-2 py-1 w-28 rounded-lg hover:bg-slate-600"
                    v-on:click="limpiar"
                >
                    Validar
                </button>
            </div>
        </div>

        <!-- Numero Validado -->

        <div class="flex flex-wrap items-center gap-2 mr-16 bg-gray-700 rounded-lg text-white py-6 px-12">
            <p class="font-bold">Numero Phone:</p>
            <div
                v-show="existe"
                class="py-3 px-4 border-2 border-cyan-500 rounded-lg"
            >
                <p>{{ Phone }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ValiRapida",
    components: {},
    data() {
        return {
            existe: false,
            Phone: "",
        };
    },
    methods: {
        limpiar() {
            this.existe = true;
        },
        Validar() {
            if (
                isNaN(this.Phone) ||
                this.Phone.length != 10 ||
                this.Phone.indexOf("809") == 0 ||
                this.Phone.indexOf("829") == 0 ||
                this.Phone.indexOf("849") == 0
            ) {
                this.Phone = this.Phone.split("-").join("");

                this.Phone = this.Phone.split("/").join("");

                this.Phone = this.Phone.split(".").join("");

                this.Phone = this.Phone.split("_").join("");

                //Si la cantidad de caracteres no es correcta
                if (this.Phone.length != 10) {
                    this.Phone = "Cantidad incorrecta de caracteres";
                }
            }
            //Si tiene letras o caracteres raros
            if (isNaN(this.Phone)) {
                this.Phone = "Caracteres invalidos";
            }

            //Si no tienen un comienzo valido
            if (
                this.Phone.indexOf("809") == 0 ||
                this.Phone.indexOf("829") == 0 ||
                this.Phone.indexOf("849") == 0
            ) {
                this.Phone = this.Phone;
            } else {
                this.Phone = "Comienzo invalido";
            }
            //Si el numero es valido desde el inicio
            if (
                !isNaN(this.Phone) &&
                (this.Phone.indexOf("809") == 0 ||
                    this.Phone.indexOf("829") == 0 ||
                    this.Phone.indexOf("849") == 0) &&
                this.Phone.length === 10
            ) {
                this.Phone = this.Phone;
            }

            if(this.Phone == ""){
                this.Phone = "";
            }
        },
    },
};
</script>
