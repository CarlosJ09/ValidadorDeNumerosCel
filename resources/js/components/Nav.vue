<script setup>
import DropdownLink from "@/Components/DropdownLink.vue";
</script>

<template>
    <div
        class="bg-white fixed w-full flex items-center justify-between px-8 border-slate-500 border-b-2"
    >
        <img class="w-44 h-auto" src="../../assets/sendIU.png" alt="" />
        <div class="flex items-center">
            <div class="menu">
                <ul>
                    <li
                        class="mr-2 font-bold hover:text-gray-700 hover:cursor-pointer"
                    >
                        {{ user.name }}
                        <p v-show="!user.email">User_Name</p>
                        <ul
                            class="hidden text-black bg-white text-center absolute p-4 border-black border"
                        >
                            <li class="hover:text-gray-500">
                                <DropdownLink
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                >
                                    User
                                </DropdownLink>
                            </li>
                            <li class="hover:text-gray-500">
                                <DropdownLink
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                >
                                    Log Out
                                </DropdownLink>
                            </li>
                            <li class="hover:text-gray-500">
                                <DropdownLink
                                    :href="route('administrador')"
                                    method="get"
                                    as="button"
                                >
                                    Admin
                                </DropdownLink>
                            </li>

                            <li class="hover:text-gray-500">
                                <DropdownLink
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                >
                                    Settings
                                </DropdownLink>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <span class=""
                ><img
                    class="bg-cover w-8"
                    src="../../assets/ic-profile_97616.png"
                    alt=""
            /></span>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Nav",
    components: {},
    data() {
        return { user: [] };
    },
    created() {
        axios
            .get("api/index")
            .then((response) => {
                this.user = response.data;
            })
            .catch((error) => {
                console.log(error.response);
            });
    },
};
</script>
