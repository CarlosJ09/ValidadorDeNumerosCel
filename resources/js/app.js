import "./bootstrap";
import { createApp, VueElement } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import app from "./components/app.vue";
import Home from "../views/Home.vue";
import Create from "../views/Create.vue";
import Form from "../views/Form.vue";
import Validacion from "../views/Validacion.vue";

const routes = [
    { path: "/", component: Form },
    { path: "/Home", component: Home },
    { path: "/Create", component: Create },
    { path: "/Validacion", component: Validacion },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

createApp(app).use(router).mount("#app");
