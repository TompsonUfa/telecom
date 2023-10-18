import {createRouter, createWebHistory} from "vue-router";
import routes from "@/router/routes.js";

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: 'active',
    routes: routes,
})

export default router;
