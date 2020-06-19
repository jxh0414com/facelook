<template>
    <div id="profile_about">
        <v-container>
            <v-row>
                <v-col cols="12" sm="4">
                    <v-tabs v-model="tab" vertical>
                        <v-tab v-for="item in items" :key="item.tab">
                            {{ item.tab }}
                        </v-tab>
                    </v-tabs>
                </v-col>

                <v-col cols="12" md="8">
                    <v-tabs-items v-model="tab">
                        <v-tab-item v-for="item in items" :key="item.tab">
                            <component :is="item.content"></component>
                        </v-tab-item>
                    </v-tabs-items>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tab: null,
            items: [
                {
                    tab: "Overview",
                    content: require("./about/Overview").default
                },
                {
                    tab: "Career",
                    content: require("./about/Career").default
                },
                {
                    tab: "Address",
                    content: require("./about/Address").default
                },
                {
                    tab: "Contact",
                    content: require("./about/Contact").default
                },
                {
                    tab: "Relationship",
                    content: require("./about/Relationship").default
                }
            ]
        };
    }
};
</script>
