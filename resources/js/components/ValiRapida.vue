<template>
    <div
        class="flex flex-col bg-white p-6 justify-start border border-gray-800 h-5/6"
    >
        <div class="flex items-center mb-4">
            <span><img src="../../assets/check.png" alt="" /></span>
            <h2 class="text-2xl ml-2">Validación Telefónico</h2>
        </div>
        <p class="ml-12 text-md mb-2 font-bold">
            Ingrese el nombre del cliente
        </p>
        <div class="flex items-center ml-8">
            <input
                type="text"
                class="border border-black mx-4 rounded-lg p-0.5 w-64"
            />
        </div>

        <div class="flex ml-12 mt-12">
            <div class="flex flex-col">
                <p class="font-bold">Seleccione el archivo a validar.</p>
                <div
                    class="flex flex-col justify-center mt-1 items-center bg-slate-100 max-w-80 max-h-44 p-6 border-gray-300 border-2 rounded-lg"
                >
                    <img
                        src="../../assets/CSV.png"
                        alt="CSV"
                        class="h-12 w-12"
                    />
                    <span class="text-sm text-gray-800 text-center"
                        >Favor cargar el archivo en formato CSV</span
                    >
                    <div>
                        <button
                            class="mt-4 border bg-slate-800 text-white p-1 rounded-xl px-4 text-center"
                            v-on:click="validar = !validar"
                        >
                            Importar
                        </button>
                    </div>
                    <div v-show="validar" class="text-center bg-blue-300">
                        <vue-csv-import
                            v-slot="{ file }"
                            v-model="csv"
                            :fields="{
                                name: { required: false, label: 'Name' },
                                phone: { required: true, label: 'Phone' },
                            }"
                        >
                            <vue-csv-toggle-headers></vue-csv-toggle-headers>
                            <vue-csv-errors></vue-csv-errors>
                            <vue-csv-input></vue-csv-input>
                            <vue-csv-map :auto-match="false">{{file.fields}}</vue-csv-map>
                        </vue-csv-import>
                    </div>
                </div>
            </div>
            <div class="flex flex-col ml-12">
                <p class="text-md mb-2 font-bold">
                    Seleccione la columna que contiene los numeros
                </p>
                <select
                    name="list"
                    class="w-72 bg-white border border-gray-300 h-8 rounded-lg"
                >
                    <option value="1">Opcion1</option>
                    <option value="2">Opcion2</option>
                    <option value="3">Opcion3</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
import {
    VueCsvImport,
    VueCsvInput,
    VueCsvToggleHeaders,
    VueCsvErrors,
    VueCsvMap,
} from "vue-csv-import";

export default {
    name: "ValiRapida",
    components: {
        VueCsvImport,
        VueCsvInput,
        VueCsvToggleHeaders,
        VueCsvErrors,
        VueCsvMap,
    },
    data() {
        return {
            validar: false,
            items: [],
        };
    },
    props: {},
    mounted() {},
};
</script>
