<template>
    <div class="flex flex-col justify-center h-full self-center items-center bg-sky-600 p-2">
        <div class="text-2xl text-white font-bold mt-52">
            <RouterLink to="/Reportes" id="atras" class="hover:text-gray-200">Volver Atras</RouterLink>
        </div>
        <div> 
            <div class="flex justify-center mt-10 pb-12">
                <table class="text-center rounded-md bg-white">
                    <thead class="border-2">
                        <tr
                            class="bg-slate-900 text-white font-bold border-2 border-slate-900"
                        >
                            <th class="px-16">Cliente</th>
                            <th class="px-16">Usuario</th>
                            <th class="px-16">Invalidos</th>
                            <th class="px-16">Validados</th>
                            <th class="px-16">Total</th>
                        </tr>
                    </thead>
                    <tbody
                        class="border-2 bg-white border-slate-900"
                        v-for="report in reports"
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
                            <!-- <td class="border-x-2 border-gray-700">
                                {{ data.cant_val }}
                            </td> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="#atras" class="fixed bg-white right-8 rounded-lg bottom-4 hover:h-14"><img src="../../assets/up.png" alt=""></a>
    </div>
</template>

<script>
export default {
    name: "ReportView",
    components: {
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
                console.log(response.data)
            })
            .catch((error) => {
                console.log(error.response);
            });
    },
};
</script>
