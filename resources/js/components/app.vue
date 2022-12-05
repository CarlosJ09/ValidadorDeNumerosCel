<template>
    <div>
        <div>
            <Nav />
            <RouterView />
        </div>
    </div>
</template>

<script>
import Nav from "../components/Nav.vue";

export default {
    name: "app",
    components: {
        Nav,
    },
};
</script>
