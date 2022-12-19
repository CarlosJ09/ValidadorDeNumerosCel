<template>
    <div>
        <Nav />
    </div>
    <div class="menu0 flex h-screen w-full py-4">
        <div>
            <sideBar />
        </div>
        <div
            style="
                margin-left: 20%;
                margin-top: 74px;
                background-color: #e9e9e9;
            "
            class="dashBoard flex flex-col w-4/5 h-max"
        >
            <h1 class="p-6 font-bold text-2xl">DashBoard</h1>
            <!-- Componente de Graficos -->
            <Charts />
            <div class="flex justify-center mt-10 pb-12">
                <table class="text-center rounded-md bg-white">
                    <thead class="border-2">
                        <tr
                            class="bg-slate-900 text-white font-bold border-2 border-slate-900"
                        >
                            <th class="px-16">Cliente</th>
                            <th class="px-16">Usuario</th>
                            <th class="px-16">Fecha</th>
                            <th class="px-16">Invalidos</th>
                            <th class="px-16">Validados</th>
                            <th class="px-16">Total</th>
                        </tr>
                    </thead>
                    <tbody
                        class="border-2 bg-white border-slate-900"
                        v-for="client in clients.slice(0, 10)"
                        :key="client.id"
                    >
                        <tr>
                            <td class="border-x-2 border-gray-700">
                                {{ client.name }}
                            </td>
                            <td class="border-x-2 border-gray-700">
                                {{ client.email }}
                            </td>
                            <td class="border-x-2 border-gray-700">
                                {{ client.updated_at.slice(0,10) }}
                            </td>
                            <td class="border-x-2 border-gray-700">46</td>
                            <td class="border-x-2 border-gray-700">92</td>
                            <td class="border-x-2 border-gray-700">138</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import sideBar from "../components/sideBar.vue";
import Charts from "../components/Charts.vue";
import Nav from "../components/Nav.vue";

import "../../css/app.css";

export default {
    name: "Home",
    components: {
        Nav,
        sideBar,
        Charts,
    },
    data() {
        return {
            reports: [],
            clients: [],
        };
    },
    created() {
        axios
            .get("/Reports")
            .then((response) => {
                this.reports = JSON.parse(
                    response.data[response.data.length - 1].json
                );
            })
            .catch((error) => {
                console.log(error.response);
            });

        axios
            .get("/Clients", this.clients)
            .then((response) => {
                this.clients = response.data;
            })
            .catch((error) => {
                console.log(error.response);
            });
    },
};
</script>
