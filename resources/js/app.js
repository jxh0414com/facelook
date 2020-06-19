require("./bootstrap");

import Vue from "vue";
import App from "./components/App";

import router from "./routes";
import store from "./store/store";
import vuetify from "./vuetify";

import Cookies from "js-cookie";

const isAuthenticated = Cookies.get("auth");
router.beforeEach((to, from, next) => {
    if (to.name !== "login" && !isAuthenticated) next({ name: "login" });
    else next();
});

new Vue({
    el: "#app",
    router,
    store,
    vuetify,
    components: { App }
});
