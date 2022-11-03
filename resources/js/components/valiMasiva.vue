<template>
    <div
        class="flex flex-col bg-white p-6 justify-start border border-gray-800"
    >
        <div class="flex items-center mb-4">
            <span><img src="../../assets/check.png" alt="" /></span>
            <h2 class="text-2xl ml-2">Validación Telefónico</h2>
        </div>
        <p class="ml-4 text-md mb-2">Ingrese el numero que desea validar</p>
        <div class="flex items-center">
            <input
                type="text"
                class="border border-black mx-4 rounded-lg p-0.5"
            />
            <button class="bg-slate-800 text-white px-2 py-1 w-28 rounded-lg">
                Validar
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "ValiMasiva",
    components: {},
};
</script>
