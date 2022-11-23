<!-- Logica de Validacion -->
<template>
    <div
        class="flex flex-col bg-white p-6 justify-start border border-gray-800 h-5/6"
    >
        <!-- Titulo -->
        <div class="flex items-center mb-4">
            <span><img src="../../assets/check.png" alt="" /></span>
            <h2 class="text-2xl ml-2">Validación Telefónico</h2>
        </div>
        <!-- Campos para ingresar datos -->
        <div class="flex justify-around flex-wrap gap-2">
            <div class="flex flex-col justify-center">
                <p class="text-md mb-2 font-bold text-center">
                    Ingrese el nombre del cliente
                </p>
                <div class="flex items-center">
                    <input
                        class="border border-black rounded-lg p-1 w-64"
                        name="name"
                        v-model="client.name"
                        required
                    />
                </div>
            </div>

            <div class="flex flex-col justify-center">
                <p class="text-md mb-2 font-bold text-center">
                    Ingrese el email
                </p>
                <div class="flex items-center">
                    <input
                        key="email"
                        type="text"
                        class="border border-black rounded-lg p-1 w-64"
                        name="email"
                        v-model="client.email"
                        required
                    />
                </div>
            </div>
            <div class="flex flex-col justify-center">
                <p class="text-md mb-2 font-bold text-center">
                    Ingrese la compañia
                </p>
                <div class="flex items-center">
                    <input
                        key="company"
                        type="text"
                        class="border border-black rounded-lg p-1 w-64"
                        name="company"
                        v-model="client.company"
                        required
                    />
                </div>
            </div>
        </div>
        <!-- Seleccionar Archivo -->
        <div
            class="flex justify-center text-center gap-x-24 gap-y-8 flex-wrap mt-12"
        >
            <div class="flex flex-col">
                <p class="font-bold text-lg">
                    Seleccione el archivo a validar.
                </p>
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
                            class="mt-4 border bg-slate-800 text-white p-1 rounded-xl px-4 text-center hover:bg-slate-600"
                            v-on:click="validar = !validar"
                        >
                            Importar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Vista tabla de validación -->
    <div
        v-show="validar"
        class="fixed flex flex-wrap border-2 rounded-xl border-slate-700 flex-col justify-center items-center p-8 bg-gray-400 w-max h-max top-2 right-0 left-0 m-auto"
    >
        <div class="flex items-center gap-2">
            <input
                type="file"
                accept=".csv"
                @change="handleFileUpload($event)"
                class="bg-slate-700 text-white font-bold text-center p-2"
            />
            <button
                class="bg-red-700 w-8 h-8 rounded-lg p-0.5 hover:bg-red-600"
                v-on:click="validar = !validar"
            >
                <img src="../../assets/close.png" alt="" />
            </button>
        </div>

        <div class="overflow-auto h-80 w-full mt-4">
            <table
                v-if="parsed"
                class="border-spacing-0 border-separate bg-white"
            >
                <thead class="sticky top-0 left-0 bg-slate-700 text-white">
                    <tr>
                        <th
                            v-for="(header, key) in content.meta.fields"
                            v-bind:key="'header-' + key"
                        >
                            {{ header }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(row, rowKey) in content.data"
                        v-bind:key="'row-' + rowKey"
                    >
                        <td
                            v-for="(column, columnKey) in content.meta.fields"
                            v-bind:key="
                                'row-' + rowKey + '-column-' + columnKey
                            "
                        >
                            <div>
                                <input
                                    type="text"
                                    v-model="content.data[rowKey][column]"
                                    class="text-center px-4"
                                />
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!--Solo se muestra en caso de que no haya data para subir-->
        <div v-show="valido" class="text-red-800 font-bold">
            <p>No hay ningun archivo seleccionado</p>
        </div>

        <div class="flex justify-center items-center font-bold text-white">
            <!-- Boton para  descargar el archivo-->
            <button
                class="p-4 bg-slate-800 hover:bg-slate-600 mt-4 border-2 rounded-lg"
                v-on:click="valido = true ? !content.data : (valido = false)"
            >
                <download-csv :data="content.data">
                    Descargar Archivo ".csv"
                </download-csv>
            </button>

            <!-- Boton para subir los cambios -->
            <form
                method="POST"
                v-on:submit.prevent="submitUpdates()"
                action="{{ route('/Validacion') }}"
                class="mt-4 ml-4"
            >
                <button>
                    <input
                        type="submit"
                        value="Subir"
                        class="bg-slate-800 px-12 py-4 rounded-lg hover:bg-slate-600 hover:cursor-pointer border-2"
                    />
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import Papa from "papaparse";
import axios from "axios";
import JsonCSV from "vue-json-csv";

//  Flag para mostrar mensaje de error a la hora de descargar archivo
let valido = false;

export default {
    name: "ValiMasiva",
    components: {
        downloadCsv: JsonCSV,
    },
    data() {
        return {
            valido,
            validar: false,
            file: "",
            content: [],
            parsed: false,
            client: {
                name: "",
                email: "",
                company: "",
            },
        };
    },
    props: {},
    methods: {
        //Subir archivo
        handleFileUpload(event) {
            this.file = event.target.files[0];
            this.parseFile();
        },
        parseFile() {
            Papa.parse(this.file, {
                header: true,
                skipEmptyLines: true,
                complete: function (results) {
                    this.content = results; //Results = Objeto con toda la informacion
                    this.parsed = true;

                    //Objeto con los mensajes de errores para la validacion
                    let mensajes = {
                        invalido1: "Contiene caracteres no númericos",
                        invalido2: "Invalida cantidad de números",
                        invalido3: "Comienzo de números inválidos",
                        nA: "N/A",
                        nValido: "Número valido",
                    };

                    /*Validando String */
                    results.data.forEach((nombre) => {
                        //Validar
                        try {
                            //Si tienen Guiones o Slash
                            if (
                                isNaN(nombre.Phone) ||
                                nombre.Phone.length != 10 ||
                                nombre.Phone.indexOf("809") == 0 ||
                                nombre.Phone.indexOf("829") == 0 ||
                                nombre.Phone.indexOf("849") == 0
                            ) {
                                nombre.NumeroValido =
                                    nombre.Phone.split("-").join("");

                                nombre.NumeroValido =
                                    nombre.NumeroValido.split("/").join("");

                                nombre.NumeroValido =
                                    nombre.NumeroValido.split(".").join("");

                                nombre.NumeroValido =
                                    nombre.NumeroValido.split("_").join("");

                                nombre.Reporte = mensajes.invalido1;

                                //Si la cantidad de caracteres no es correcta
                                let telefonoval = nombre.NumeroValido;
                                if (telefonoval.length != 10) {
                                    nombre.NumeroValido = mensajes.nA;
                                    nombre.Reporte = mensajes.invalido2;
                                }
                            }
                            //Si tiene letras o caracteres raros
                            if (isNaN(nombre.NumeroValido)) {
                                nombre.NumeroValido = mensajes.nA;
                                nombre.Reporte = mensajes.invalido1;
                            }

                            //Si no tienen un comienzo valido
                            if (
                                nombre.Phone.indexOf("809") == 0 ||
                                nombre.Phone.indexOf("829") == 0 ||
                                nombre.Phone.indexOf("849") == 0
                            ) {
                                if (nombre.NumeroValido.length != 10) {
                                    nombre.Reporte = mensajes.invalido2;
                                }
                            } else {
                                nombre.Reporte = mensajes.invalido3;
                                nombre.NumeroValido = mensajes.nA;
                            }
                            //Si el numero es valido desde el inicio
                            if (
                                !isNaN(nombre.Phone) &&
                                (nombre.Phone.indexOf("809") == 0 ||
                                    nombre.Phone.indexOf("829") == 0 ||
                                    nombre.Phone.indexOf("849") == 0) &&
                                nombre.Phone.length === 10
                            ) {
                                nombre.Reporte = mensajes.nValido;
                            }
                        } catch (error) {
                            //Excepcion
                            console.error(
                                `Favor introducir archivo con las columnas validas ${error} ${valido}`
                            );
                        }
                    });
                }.bind(this),
            });
        },
        submitUpdates() {
            axios
                .post("/Reports", this.content.data )
                .then((response) => {
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error.response);
                });

            axios
                .post("/Clients", this.client)
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
