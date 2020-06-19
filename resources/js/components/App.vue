<template>
    <v-app>
        <Navbar></Navbar>
        <router-view></router-view>
        <Footer></Footer>
    </v-app>
</template>

<script>
export default {
    components: {
        Navbar: require("./layout/Navbar").default,
        Footer: require("./layout/Footer").default
    }
};
</script>

<style>
.router-link {
}
</style>
