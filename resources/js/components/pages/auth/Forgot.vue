<template>
    <div id="forgot">
        <v-container>
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
                            :rules="[
                                v => !!v || 'E-mail is required',
                                v =>
                                    /.+@.+\..+/.test(v) ||
                                    'E-mail must be valid'
                            ]"
                            class="px-4"
                        ></v-text-field>
                        <ErrorText :text="errors.email"></ErrorText>

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
                email: ""
            },
            errors: {}
        };
    },
    methods: {
        ...mapActions(["forgot"]),
        submit() {
            if (this.$refs.form.validate()) {
                this.forgot(this.user)
                    .then(() => {
                        window.alert(
                            "Please Check email for further instruction"
                        );
                    })
                    .catch(err => (this.errors = err.response.data.errors));
            }
        }
    }
};
</script>
