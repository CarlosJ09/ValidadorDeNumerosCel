<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { Link } from '@inertiajs/inertia-vue3';


const props = defineProps({
    permissions: {
        type: Object,
        default: () => ({}),
    },
    can: {
        type: Object,
        default: () => ({}),
    },
});

const createPermission = () => {
    Inertia.get(route("permission.create"));
};

const deletePermission = (id) => {
    Inertia.delete(route("permission.destroy", id));
};
</script>
<template>
    <Head title="Permission" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Permisos
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div
                        class="flex bg-gray-800 justify-between items=center p-5"
                    >
                        <div class="flex space-x-2 items-center text-white">
                            Permission Settings Page! Here you can list, create,
                            update or delete permission!
                        </div>
                        <div
                            class="flex space-x-2 items-center"
                            v-if="can.create"
                        >
                            <Link
                                href="/register"
                                class="px-4 py-2 bg-sky-500 uppercase text-white rounded focus:outline-none flex items-center"
                                @click="createPermission"
                            >
                                <span
                                    class="iconify mr-1"
                                    data-icon="gridicons:create"
                                    data-inline="false"
                                ></span>
                                Crear Permiso
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table
                        class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                    >
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="py-3 px-6">Nombre</th>
                                <th
                                    v-if="can.edit || can.delete"
                                    scope="col"
                                    class="py-3 px-6"
                                >
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="permission in permissions.data"
                                :key="permission.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                            >
                                <td data-label="Name" class="py-4 px-6">
                                    {{ permission.name }}
                                </td>
                                <td
                                    v-if="can.edit || can.delete"
                                    class="py-4 px-6"
                                >
                                    <div
                                        type="justify-start lg:justify-end"
                                        no-wrap
                                    >
                                        <Link
                                            class="ml-4 bg-green-500 px-2 py-1 rounded text-white cursor-pointer"
                                            v-if="can.edit"
                                            :href="route('permission.edit', permission.id)"
                                        >
                                          Editar
                                        </Link>
                                        <button
                                            class="ml-4 bg-red-500 px-2 py-1 rounded text-white cursor-pointer"
                                            v-if="can.delete"
                                            @click="
                                                deletePermission(permission.id)
                                            "
                                        >
                                            Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
