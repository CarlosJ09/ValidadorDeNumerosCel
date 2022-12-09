<template>
    <div>
        <Nav />
    </div>
    <div class="menu0 flex h-screen w-full py-4">
        <div>
            <sideBar />
        </div>
        <div
            style="margin-left: 20%; margin-top: 74px"
            class="flex flex-col justify-center items-center flex-wrap w-4/5 h-max"
        >
            <!-- <div v-if="!data" class="justify-center items-center mt-64">
                <p class="text-xl text-black font-bold">
                    No hay ningun reporte hasta ahora
                </p>
            </div> -->
            <div
                v-for="report in data"
                class="flex flex-wrap text-center gap-4 justify-between w-11/12 bg-sky-600 px-4 py-8 rounded-lg mt-4 text-white hover:bg-sky-800"
            >
                <div class="font-bold text-xl">
                    <a href="/reportes/individual"
                        ><h1 class="hover:text-gray-200">
                            {{ report.report_name }}
                        </h1></a
                    >
                </div>
                <div class="flex gap-2">
                    <p class="font-bold">Cantidad de numeros validados:</p>
                    {{ report.cant_val }}
                    <div class="flex gap-2 mx-8">
                        <p class="font-bold">Creado:</p>
                        <p>{{ report.created_at.substring(0, 10) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Nav from "../components/Nav.vue";
import sideBar from "../components/sideBar.vue";

export default {
    name: "Reportes",
    components: {
        Nav,
        sideBar,
    },
    data() {
        return {
            data: [],
            reports: [],
        };
    },
    created() {
        axios
            .get("/Reports")
            .then((response) => {
                this.data = response.data;
            })
            .catch((error) => {
                console.log(error.response);
            });

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
