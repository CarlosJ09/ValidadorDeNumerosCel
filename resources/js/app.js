import "./bootstrap";
import { createApp, VueElement } from "vue";
import { createRouter, createWebHistory } from 'vue-router';
import app from './components/app.vue';
import Home from './components/Home.vue';
import Form from './components/Form.vue';
import Validacion from './components/Validacion.vue'

const routes = [
    {path: "/", component: Form},
    {path: "/Home", component: Home},
    {path: "/Validacion", component: Validacion},
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes
})

createApp(app).use(router).mount("#app");

