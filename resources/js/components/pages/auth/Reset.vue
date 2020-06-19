<template>
    <div id="forgot">
        <v-container v-if="!isLoading">
            <v-row justify="center">
                <v-card width="500">
                    <v-card-title class="overline"
                        >Forgot Password</v-card-title
                    >
                    <ErrorText class="py-4" :text="errors.error"></ErrorText>
                    <v-form
                        @submit.prevent="submit"
                        ref="form"
                        v-model="valid"
                        lazy-validation
                    >
                        <v-text-field
                            v-model="user.email"
                            label="E-mail"
                            required
                            :disabled="!!user.email"
                            :rules="[
                                v => !!v || 'E-mail is required',
                                v =>
                                    /.+@.+\..+/.test(v) ||
                                    'E-mail must be valid'
                            ]"
                            class="px-4"
                        ></v-text-field>
                        <ErrorText :text="errors.email"></ErrorText>

                        <v-text-field
                            v-model="user.password"
                            label="Password"
                            required
                            :rules="[
                                v => !!v || 'Password is required',
                                v =>
                                    (v && v.length >= 6) ||
                                    'Password must be at least 6 characters'
                            ]"
                            class="px-4"
                            type="password"
                        ></v-text-field>
                        <ErrorText :text="errors.password"></ErrorText>

                        <v-text-field
                            v-model="user.password_confirmation"
                            label="Confirm Password"
                            required
                            :rules="[
                                v => !!v || 'Confirm Password is required',
                                v =>
                                    v === user.password ||
                                    'Password must matched'
                            ]"
                            class="px-4"
                            type="password"
                        ></v-text-field>
                        <ErrorText
                            :text="errors.password_confirmation"
                        ></ErrorText>

                        <v-btn class="m-4 float-right" type="submit"
                            >Submit</v-btn
                        >
                    </v-form>
                </v-card>
            </v-row>
        </v-container>

        <v-container v-else>
            <v-row justify="center">
                <p class="overline red--text">
                    Invalid Token. Please try again
                </p>
            </v-row>
            <v-row justify="center">
                <router-link class="overline" :to="{ name: 'forgot' }"
                    >Forgot Password</router-link
                >
            </v-row>
        </v-container>
    </div>
</template>

<script>
import { mapActions } from "vuex";
import ErrorText from "../../helpers/ErrorText";
export default {
    components: { ErrorText },
    data() {
        return {
            valid: true,
            user: {
                email: "",
                password: "",
                password_confirmation: ""
            },
            errors: {},
            isLoading: false
        };
    },
    created() {
        this.verifyToken(this.$route.params.token)
            .then(res => {
                this.user.email = res.data.email;
            })
            .catch(err => (this.isLoading = true));
    },
    methods: {
        ...mapActions(["verifyToken", "reset"]),
        submit() {
            if (this.$refs.form.validate()) {
                this.reset(this.user)
                    .then(() => {
                        window.alert("Password has successfully reset!");
                    })
                    .catch(err => (this.errors = err.response.data.errors));
            }
        }
    }
};
</script>
