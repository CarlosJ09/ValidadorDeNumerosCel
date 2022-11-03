<template>
    <div style="margin-top: 74px;" class="menu fixed bg-white border-2 border-slate-500 w-1/5 font-bold h-full">
            <div class="sideBar text-xl text-center">
                <div
                    class="border-l border-r border-slate-500 border-b py-6"
                >
                    <p class="titulo text-2xl">Aplicaciones</p>
                </div>
                <div
                    class="flex flex-wrap items-center justify-around border py-2 border-slate-500 hover:bg-gray-200 hover:cursor-pointer"
                >
                    <router-link to="/Home">Administrador</router-link>
                    <span><img src="../../assets/admin.png" alt="Admin"></span>
                </div>
                <div
                    class="flex flex-wrap items-center justify-around border py-2 border-slate-500 hover:bg-gray-200 hover:cursor-pointer"
                >
                    <router-link to="/Validacion">Validador</router-link>
                    <span class="icono ml-12"><img src="../../assets/list.png" alt="Validador"></span>
                </div>
                <div
                    class="flex flex-wrap items-center justify-around border border-b-2 border-slate-500 py-2 hover:bg-gray-200 hover:cursor-pointer"
                >
                    <router-link to="/Home">Reportes</router-link>
                    <span class="icono ml-12"><img src="../../assets/analysis.png" alt="Reportes"></span>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        name: 'sideBar',
        components: {
            
        }
    }
</script>