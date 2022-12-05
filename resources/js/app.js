import "./bootstrap";
import { createApp, VueElement } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import app from "./components/app.vue";
import Home from "../views/Home.vue";
import Register from "../views/Register.vue";
import Form from "../views/Form.vue";
import Validacion from "../views/Validacion.vue";
import Reportes from "../views/Reportes.vue";
import ReportView from "./components/ReportView.vue";

const routes = [
    {
        path: "/",
        name: "Login",
        component: Form,
    },
    {
        path: "/Register",
        name: "Register",
        component: Register,
        meta: {
            requiresAuth: false,
        },
    },
    {
        path: "/Home",
        name: "Home",
        component: Home,
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/Validacion",
        component: Validacion,
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/Reportes",
        component: Reportes,
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/Reportes/ReportView",
        component: ReportView,
        meta: {
            requiresAuth: true,
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

router.beforeEach((to, from) => {
    if (to.meta.requiresAuth && !localStorage.getItem("token")) {
        return { name: "Login" };
    }

    if (to.meta.requiresAuth == false && localStorage.getItem("token")) {
        return { name: "Home" };
    }
});

createApp(app).use(router).mount("#app");
