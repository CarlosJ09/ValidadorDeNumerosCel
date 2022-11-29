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
            <div class="flex flex-wrap justify-around m-4">
                <div class="flex flex-col justify-center items-center">
                    <div class="max-w-7xl h-auto">
                        <canvas id="myChart"></canvas>
                    </div>
                    <p class="text-gray-800 mt-2">Total de No. Validados</p>
                    <p class="text-gray-800">1,992.34</p>
                </div>

                <div class="flex flex-col justify-center items-center">
                    <div class="max-w-7xl h-auto">
                        <canvas id="myChart2"></canvas>
                    </div>
                    <p class="text-gray-800 mt-2">Total de No. Validados</p>
                    <p class="text-gray-800">1,992.34</p>
                </div>

                <div class="flex flex-col justify-center items-center">
                    <div class="max-w-7xl h-auto">
                        <canvas id="myChart3"></canvas>
                    </div>
                    <p class="text-gray-800 mt-2">Total de No. Invalidados</p>
                    <p class="text-gray-800">1,992.34</p>
                </div>
            </div>
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
                            <th class="px-16">Validado</th>
                            <th class="px-16">Total</th>
                            <th class="px-16">Acciones</th>
                        </tr>
                    </thead>
                    <tbody
                        class="border-2 bg-white border-slate-900"
                        v-for="report in reports.slice(0, 10)"
                    >
                        <tr>
                            <td class="border-x-2 border-gray-700">
                                {{ report.Name }}
                            </td>
                            <td class="border-x-2 border-gray-700">
                                {{ report.Email }}
                            </td>
                            <td class="border-x-2 border-gray-700">8/7/2002</td>
                            <td class="border-x-2 border-gray-700">
                                {{ report.Phone }}
                            </td>
                            <td class="border-x-2 border-gray-700">
                                {{ report.NumeroValido }}
                            </td>
                            <td class="border-x-2 border-gray-700">
                                {{ report.Phone }}
                            </td>
                            <td class="border-x-2 border-gray-700">Acciones</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import Chart from "chart.js/auto";
import Nav from "../js/components/Nav.vue";
import sideBar from "../js/components/sideBar.vue";

import "../css/app.css";

export default {
    name: "Home",
    components: {
        Nav,
        sideBar,
    },
    props: {
        message: String,
    },
    mounted() {
        const ctx = document.getElementById("myChart");
        const myChart = new Chart(ctx, {
            type: "polarArea",
            data: {
                labels: [
                    "Caracteres invalidos",
                    "Validos",
                    "Cantidad de numeros invalida",
                    "Otros",
                ],
                datasets: [
                    {
                        label: "# of Votes",
                        data: [122, 200, 13, 50, 200, 300],
                        backgroundColor: [
                            "rgb(255, 99, 132)",
                            "rgb(54, 162, 235)",
                            "rgb(255, 205, 86)",
                            "rgb(75, 192, 192)",
                            "rgb(153, 102, 255)",
                            "rgb(255, 159, 64)",
                        ],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
        myChart;

        const ctx2 = document.getElementById("myChart2");
        const myChart2 = new Chart(ctx2, {
            type: "doughnut",
            data: {
                labels: ["Red", "Blue", "Yellow", "Black"],
                datasets: [
                    {
                        label: "My First Dataset",
                        data: [300, 50, 100, 400],
                        backgroundColor: [
                            "rgb(255, 99, 132)",
                            "rgb(54, 162, 235)",
                            "rgb(255, 205, 86)",
                            "rgb(0, 0, 0)",
                        ],
                        hoverOffset: 4,
                    },
                ],
            },
        });
        myChart2;

        const ctx3 = document.getElementById("myChart3");
        const myChart3 = new Chart(ctx3, {
            type: "pie",
            data: {
                labels: [
                    "Caracteres invalidos",
                    "Validos",
                    "Cantidad de numeros invalida",
                    "Otros",
                ],
                datasets: [
                    {
                        label: "My First Dataset",
                        data: [300, 50, 100, 40],
                        backgroundColor: [
                            "rgb(75, 192, 192)",
                            "rgb(255, 99, 132)",
                            "rgb(255, 205, 86)",
                            "rgb(0, 0, 0)",
                        ],
                        hoverOffset: 4,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
        myChart3;
    },
    data() {
        return {
            reports: [],
        };
    },
    created() {
        axios
            .get("/Reports")
            .then((response) => {
                this.reports = JSON.parse(response.data[0].json);
            })
            .catch((error) => {
                console.log(error.response);
            });
    },
};
</script>
