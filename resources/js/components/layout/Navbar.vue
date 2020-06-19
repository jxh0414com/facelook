<template>
    <div>
        <v-app-bar color="grey accent-4" dense dark>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>

            <v-toolbar-title>Page title</v-toolbar-title>

            <v-spacer></v-spacer>

            <v-btn icon>
                <v-icon>mdi-heart</v-icon>
            </v-btn>

            <v-btn icon>
                <v-icon>mdi-magnify</v-icon>
            </v-btn>

            <v-menu left bottom>
                <p>HI</p>
            </v-menu>
        </v-app-bar>
    </div>
</template>

<script>
export default {};
</script>
