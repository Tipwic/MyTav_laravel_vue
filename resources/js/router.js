import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import Index from "./views/Index";
import Guilds_list from "./views/Guilds_list";
import Guild from "./views/Guild";
import Avatar from "./views/Avatar";
//import CreatePost from "./views/CreatePost";

const routes = [
    {
        path: "/",
        component: Index
    },
    {
        path: "/guilds",
        component: Guilds_list
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
        path: "/*",
        component: Index
    }
];

export default new vueRouter({
    mode: "history",
    routes
});
