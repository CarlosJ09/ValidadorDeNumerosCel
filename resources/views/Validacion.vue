<template>
    <div>
        <div>
            <Nav />
        </div>
        <div class="flex h-screen w-full py-4 overflow-y-hidden">
            <div>
                <sideBar />
            </div>
            <div
                class="flex flex-col justify-start items-center w-full h-full"
                style="
                    background-color: #e9e9e9;
                    margin-left: 20%;
                    margin-top: 74px;
                "
            >
                <div class="w-11/12 mt-4">
                    <button
                        class="p-2 w-44 border-2 border-gray-600 hover:bg-white"
                        v-bind:class="{ bwhite: valiRapida }"
                        v-on:click="
                            valiRapida = true;
                            valiMasiva = false;
                        "
                    >
                        Validacion Rapida
                    </button>
                    <button
                        class="p-2 w-44 border-2 border-gray-600 hover:bg-white"
                        v-bind:class="{ bwhite: valiMasiva }"
                        v-on:click="
                            valiMasiva = true;
                            valiRapida = false;
                        "
                    >
                        Validacion Masiva
                    </button>

                    <div v-show="valiRapida">
                        <ValiRapida />
                    </div>
                    <div v-show="valiMasiva">
                        <ValiMasiva />
                    </div>
                </div>

                <div
                    class="flex justify-center mt-10 w-full"
                    v-show="valiMasiva"
                >
                    <table class="text-center rounded-md">
                        <thead class="border-2">
                            <tr
                                class="bg-slate-800 text-white font-bold border-2 border-slate-900"
                            >
                                <th class="px-24 py-2">Usuario</th>
                                <th class="px-24 py-2">Fecha</th>
                                <th class="px-24 py-2">Estatus</th>
                                <th class="px-24 py-2">Telefonica</th>
                                <th class="px-24 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="border-2 bg-white border-slate-900">
                            <tr>
                                <td class="border-x-2 border-gray-700">
                                    The Sliding
                                </td>
                                <td class="border-x-2 border-gray-700">
                                    Malcolm Lockyer
                                </td>
                                <td class="border-x-2 border-gray-700">1961</td>
                                <td class="border-x-2 border-gray-700">1961</td>
                                <td class="border-x-2 border-gray-700">1961</td>
                            </tr>
                            <tr>
                                <td class="border-x-2 border-gray-700">
                                    Witchy Woman
                                </td>
                                <td class="border-x-2 border-gray-700">
                                    The Eagles
                                </td>
                                <td class="border-x-2 border-gray-700">1972</td>
                                <td class="border-x-2 border-gray-700">1961</td>
                                <td class="border-x-2 border-gray-700">1961</td>
                            </tr>
                            <tr>
                                <td class="border-x-2 border-gray-700">
                                    Shining Star
                                </td>
                                <td class="border-x-2 border-gray-700">
                                    Earth, Wind, and Fire
                                </td>
                                <td class="border-x-2 border-gray-700">1975</td>
                                <td class="border-x-2 border-gray-700">1961</td>
                                <td class="border-x-2 border-gray-700">1961</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Nav from "../js/components/Nav.vue";
import sideBar from "../js/components/sideBar.vue";
import ValiRapida from "../js/components/ValiRapida.vue";
import ValiMasiva from "../js/components/valiMasiva.vue";

export default {
    name: "Validacion",
    components: {
        Nav,
        sideBar,
        ValiRapida,
        ValiMasiva,
    },
    data() {
        return {
            valiRapida: true,
            valiMasiva: false,
            isActive: true,
        };
    },
};
</script>
