import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "home",
        component: require("./components/pages/Home").default
    },
    {
        path: "/register",
        name: "register",
        component: require("./components/pages/auth/Register").default
    },
    {
        path: "/login",
        name: "login",
        component: require("./components/pages/auth/Login").default
    },
    {
        path: "/forgot",
        name: "forgot",
        component: require("./components/pages/auth/Forgot").default
    },
    {
        path: "/reset/:token",
        name: "reset",
        component: require("./components/pages/auth/Reset").default
    },
    {
        path: "/dashboard",
        name: "dashboard",
        component: require("./components/pages/Dashboard").default
    },
    {
        path: "/:user",
        name: "profile",
        component: require("./components/pages/auth/Profile").default
    }
];

export default new VueRouter({ mode: "history", routes });
