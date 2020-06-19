import router from "../../routes";

export default {
    state: {},
    getters: {},
    mutations: {},
    actions: {
        async forgot(data) {
            await axios.post("/api/user/password/forgot", data);
            router.push({ name: "login" });
        },
        async verifyToken(token) {
            return await axios.get(`/api/user/password/${token}/verify`);
        },
        async reset(data) {
            await axios.post("/api/user/password/reset", data);
            router.push({ name: "home" });
        }
    }
};
