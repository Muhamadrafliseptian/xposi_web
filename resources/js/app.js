import "./bootstrap";

import { createWebHistory, createRouter } from "vue-router";
import { createApp } from "vue";
import axios from "axios";
import App from "./src/App.vue";

// import Home from "@/views/Home.vue";

const routes = [
    {
        path: "/",
        // component: Home,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "active",
});

axios.defaults.baseURL = "http://127.0.0.1:8000/api/";
createApp(App).use(router).mount("#app");
