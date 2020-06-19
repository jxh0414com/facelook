<template>
    <div id="profile">
        <Header :user="user"></Header>
        <Info :user="user"></Info>
    </div>
</template>

<script>
import Header from "./profile/Header";
import Info from "./profile/Info";

export default {
    components: { Info, Header },
    data() {
        return {
            user: {},
            identifier: this.$route.params.user
        };
    },
    created() {
        this.getUserByIdentifier();
    },
    methods: {
        async getUserByIdentifier() {
            const res = await axios.get(`/api/user/${this.identifier}/getUser`);
            this.user = res.data.user;
        }
    }
};
</script>
