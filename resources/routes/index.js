import { 
    createRouter, 
    createWebHistory 
} from "vue-router";

import Login from "../components/login";
import Home from "../components/home";
import DevicesList from "../components/devices/list";
import NotFound from "../components/utils/NotFound";
import DefaultLayout from "../components/layouts/Default";

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