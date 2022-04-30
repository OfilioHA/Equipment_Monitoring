import { 
    createRouter, 
    createWebHistory 
} from "vue-router";

import Login from "../components/login";
import Home from "../components/home";
import NotFound from "../components/utils/NotFound";

export const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/login',
            component: Login
        },
        {
            path: '/',
            component: Home
        },
        {
            path: "/:catchAll(.*)",
            redirect: '/404'
        },
        {
            path: "/404",
            component: NotFound
        }
    ]
})