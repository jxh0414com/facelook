<template>
    <v-container>
        <v-row justify="center">
            <v-col cols="12" md="6">
                <v-card flat>
                    <v-tabs v-model="tab" background-color="grey accent-4" dark>
                        <v-tab v-for="item in items" :key="item.tab">
                            {{ item.tab }}
                        </v-tab>
                    </v-tabs>

                    <v-tabs-items v-model="tab">
                        <v-tab-item v-for="item in items" :key="item.tab">
                            <component
                                :is="item.content"
                                :user="user"
                            ></component>
                        </v-tab-item>
                    </v-tabs-items>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import About from "./components/About";
export default {
    components: { About },
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            tab: null,
            items: [
                { tab: "Timeline", content: "About" },
                { tab: "About", content: "About" },
                { tab: "Friends", content: "About" },
                { tab: "Photos", content: "About" },
                { tab: "Videos", content: "About" }
            ]
        };
    }
};
</script>
