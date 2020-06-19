<template>
    <div id="register">
        <v-container>
            <v-row justify="center">
                <v-card width="500">
                    <v-card-title class="overline">Register</v-card-title>
                    <ErrorText class="py-4" :text="errors.error"></ErrorText>
                    <v-form
                        @submit.prevent="submit"
                        ref="form"
                        v-model="valid"
                        lazy-validation
                    >
                        <v-text-field
                            v-model="user.first_name"
                            label="First name"
                            required
                            :rules="[v => !!v || 'First name is required']"
                            class="px-4"
                        ></v-text-field>
                        <ErrorText :text="errors.first_name"></ErrorText>

                        <v-text-field
                            v-model="user.last_name"
                            label="Last name"
                            required
                            :rules="[v => !!v || 'Last name is required']"
                            class="px-4"
                        ></v-text-field>
                        <ErrorText :text="errors.last_name"></ErrorText>

                        <v-text-field
                            v-model="user.email"
                            label="E-mail"
                            required
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
                first_name: "",
                last_name: "",
                email: "",
                password: "",
                password_confirmation: ""
            },
            errors: {}
        };
    },
    methods: {
        ...mapActions(["register"]),
        submit() {
            if (this.$refs.form.validate()) {
                this.register(this.user).catch(
                    err => (this.errors = err.response.data.errors)
                );
            }
        }
    }
};
</script>
