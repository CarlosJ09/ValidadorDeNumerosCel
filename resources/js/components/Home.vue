<template>
    <div>
        <Nav />
    </div>
    <div class="menu0 flex h-screen w-full py-4">
        <div>
            <sideBar />
        </div>
        <div
            style="margin-left: 20%; margin-top: 74px;background-color: #E9E9E9;"
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
                <table class="text-center rounded-md">
                    <thead class="border-2">
                        <tr
                            class="bg-slate-900 text-white font-bold border-2 border-slate-900"
                        >
                            <th class="px-16">Cliente</th>
                            <th class="px-16">Usuario</th>
                            <th class="px-16">Fecha</th>
                            <th class="px-16">Validos</th>
                            <th class="px-16">Invalidos</th>
                            <th class="px-16">Total</th>
                            <th class="px-16">Acciones</th>
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
                            <td class="border-x-2 border-gray-700">1961</td>
                            <td class="border-x-2 border-gray-700">
                                Malcolm Lockyer
                            </td>
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
                            <td class="border-x-2 border-gray-700">1961</td>
                            <td class="border-x-2 border-gray-700">
                                Malcolm Lockyer
                            </td>
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
                            <td class="border-x-2 border-gray-700">1961</td>
                            <td class="border-x-2 border-gray-700">
                                Malcolm Lockyer
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import Chart from "chart.js/auto";
import Nav from "./Nav.vue";
import sideBar from "./sideBar.vue";

import "../../css/app.css";

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
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
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
                labels: ["Red", "Blue", "Yellow","Black"],
                datasets: [
                    {
                        label: "My First Dataset",
                        data: [300, 50, 100,400],
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
                labels: ["Red", "Blue", "Yellow"],
                datasets: [
                    {
                        label: "My First Dataset",
                        data: [300, 50, 100],
                        backgroundColor: [
                            "rgb(255, 99, 132)",
                            "rgb(54, 162, 235)",
                            "rgb(255, 205, 86)",
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
};
</script>
