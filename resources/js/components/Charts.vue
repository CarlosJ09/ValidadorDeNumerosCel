<template>
    <div class="flex flex-wrap justify-around m-4">
        <div class="flex flex-col justify-center items-center">
            <div class="max-w-7xl h-auto">
                <canvas id="myChart"></canvas>
            </div>
            <p class="text-gray-800 mt-2">Total de No. Validados</p>
            <p class="text-gray-800">{{ reports.cant_val }}</p>
        </div>

        <div class="flex flex-col justify-center items-center">
            <div class="max-w-7xl h-auto">
                <canvas id="myChart2"></canvas>
            </div>
            <p class="text-gray-800 mt-2">Total de No. Validados</p>
            <p class="text-gray-800">{{ reports.cant_val }}</p>
        </div>

        <div class="flex flex-col justify-center items-center">
            <div class="max-w-7xl h-auto">
                <canvas id="myChart3"></canvas>
            </div>
            <p class="text-gray-800 mt-2">Total de No. Invalidados</p>
            <p class="text-gray-800">{{ reports.cant_val }}</p>
        </div>
    </div>
</template>

<script>
import Chart from "chart.js/auto";

export default {
    name: "Graphs",
    components: {},
    mounted() {
        const ctx = document.getElementById("myChart");
        const myChart = new Chart(ctx, {
            type: "polarArea",
            data: {
                labels: [
                    "Total de Telefonos",
                    "Telefonos Validados",
                    "Numeros Invalidos",
                ],
                datasets: [
                    {
                        label: "# of Votes",
                        data: [452, 400, 250],
                        backgroundColor: [
                            "rgb(153, 102, 255)",
                            "rgb(54, 162, 235)",
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
                labels: [
                    "Total de Telefonos",
                    "Telefonos Validados",
                    "Numeros Invalidos",
                    "Otros",
                ],
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
                    "Total de Telefonos",
                    "Telefonos Validados",
                    "Numeros Invalidos",
                ],
                datasets: [
                    {
                        label: "My First Dataset",
                        data: [300, 50, 100],
                        backgroundColor: [
                            "rgb(75, 192, 192)",
                            "rgb(255, 99, 132)",
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
    data() {
        return {
            reports: [],
            nombre: [],
        };
    },
    created() {
        axios
            .get("/Reports")
            .then((response) => {
                this.reports = response.data[0];
            })
            .catch((error) => {
                console.log(error.response);
            });
    },
};
</script>
