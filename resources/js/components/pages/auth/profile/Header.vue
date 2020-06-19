<template>
    <v-container>
        <v-row justify="center">
            <v-col cols="12" md="6">
                <v-card flat class="position-relative">
                    <v-img
                        src="https://picsum.photos/510/300?random"
                        aspect-ratio="3"
                    >
                        <v-container>
                            <v-row justify="center">
                                <v-avatar class="user_image" size="150">
                                    <img
                                        src="https://cdn.vuetifyjs.com/images/john.jpg"
                                        alt="John"
                                    />
                                </v-avatar>
                            </v-row>
                        </v-container>
                    </v-img>
                </v-card>
            </v-col>
        </v-row>

        <v-row justify="center">
            <v-col cols="12" md="6">
                <div class="overline text-center">
                    {{ user.first_name + " " + user.last_name }}
                </div>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    props: {
        user: {
            type: Object,
            required: true
        }
    }
};
</script>
