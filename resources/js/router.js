import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import Home from "./views/Home";
import Comunity from "./views/Comunity";
import Guild from "./views/Guild";
import Avatar from "./views/Avatar";
import Game from "./views/Game";

const routes = [
    {
        path: "/",
        component: Home
    },
    {
        path: "/Comunity",
        component: Comunity
    },
    {
        path: "/guild/:id",
        component: Guild
    },
    {
        path: "/avatar/:id",
        component: Avatar
    },
    {
        path: "/game/:id",
        component: Game
    },
   {
        path: "/*",
        component: Home
    }
];

export default new vueRouter({
    mode: "history",
    routes
});
