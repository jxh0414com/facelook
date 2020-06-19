import axios from "axios";
import Cookies from "js-cookie";
import router from "../../routes";

export default {
    state: {
        token: null,
        user: {}
    },
    getters: {},
    mutations: {
        setUser(state, user) {
            state.user = user;
        },
        setToken(state, token) {
            state.token = token;
            Cookies.set("auth", token);
            axios.defaults.headers.common["Authorization"] = "Bearer " + token;
        },
        removeAuth(state) {
            state.token = null;
            state.user = {};
            Cookies.remove("auth");
            delete axios.defaults.headers.common["Authorization"];
        }
    },
    actions: {
        async register({ commit }, data) {
            let res = await axios.post("/api/user/register", data);
            commit("setUser", res.data.user);
            commit("setToken", res.data.token);
            router.push({ name: "dashboard" });
        },
        async login({ commit }, data) {
            let res = await axios.post("/api/auth/login", data);
            commit("setUser", res.data.user);
            commit("setToken", res.data.token);
            router.push({ name: "dashboard" });
        },
        async me({ commit }, token) {
            if (!token) {
                return;
            } else {
                let res = await axios.get("/api/auth/me", {
                    headers: { Authorization: "Bearer " + token }
                });
                commit("setUser", res.data.user);
                commit("setToken", token);
            }
        },
        async logout({ commit }) {
            await axios.get("/api/auth/logout");
            commit("removeAuth");
        }
    }
};
