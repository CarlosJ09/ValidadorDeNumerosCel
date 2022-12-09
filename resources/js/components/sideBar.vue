<template>
    <div
        style="margin-top: 74px"
        class="menu fixed bg-white border-2 border-slate-500 w-1/5 font-bold h-full"
    >
        <div class="sideBar text-lg text-center">
            <div class="border-l border-r border-slate-500 border-b py-6">
                <p class="titulo text-xl">Aplicaciones</p>
            </div>
            <div
                class="flex flex-wrap items-center justify-around border py-2 border-slate-500 hover:bg-gray-200 hover:cursor-pointer"
            >
                <NavLink
                    class="text-lg"
                    :href="route('dashboard')"
                    :active="route().current('dashboard')"
                    >Administrador</NavLink
                >
                <span><img src="../../assets/banco.png" alt="Admin" /></span>
            </div>
            <div
                class="flex flex-wrap items-center justify-around border py-2 border-slate-500 hover:bg-gray-200 hover:cursor-pointer"
            >
                <NavLink
                    class="text-lg"
                    :href="route('validacion')"
                    :active="route().current('validacion')"
                    >Validador</NavLink
                >
                <span class="icono ml-12 justify-self-center"
                    ><img src="../../assets/validacion.png" alt="Validador"
                /></span>
            </div>
            <div
                class="flex flex-wrap items-center justify-around border border-b-2 border-slate-500 py-2 hover:bg-gray-200 hover:cursor-pointer"
            >
                <NavLink
                    class="text-lg"
                    :href="route('reportes')"
                    :active="route().current('reportes')"
                    >Reportes</NavLink
                >
                <span class="icono" style="margin-left: 4rem"
                    ><img src="../../assets/reportes.png" alt="Reportes"
                /></span>
            </div>
        </div>
    </div>
</template>

<script>
import NavLink from "@/Components/NavLink.vue";

export default {
    name: "sideBar",
    components: { NavLink },
};
</script>
