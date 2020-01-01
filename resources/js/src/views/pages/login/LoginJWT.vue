<template>
    <div>
        <vs-input
            v-validate="'required|email|min:5'"
            data-vv-validate-on="blur"
            name="email"
            icon-no-border
            icon="icon icon-user"
            icon-pack="feather"
            :label-placeholder="$t('Email')"
            v-model="form.email"
            class="w-full"/>
        <span class="text-danger text-sm">{{ errors.first('email') }}</span>

        <vs-input
            data-vv-validate-on="blur"
            v-validate="'required|min:6|max:20'"
            type="password"
            name="password"
            icon-no-border
            icon="icon icon-lock"
            icon-pack="feather"
            :label-placeholder="$t('Password')"
            v-model="form.password"
            class="w-full mt-6"/>
        <span class="text-danger text-sm">{{ errors.first('password') }}</span>

        <div class="flex flex-wrap justify-between my-5">
            <vs-checkbox v-model="form.checkbox_remember_me" class="mb-3">{{ $t('RememberMe') }}</vs-checkbox>
        </div>
        <div class="flex flex-wrap justify-between mb-3">
            <vs-button :disabled="!validateForm" @click="Login">{{ $t('Login') }}</vs-button>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex'

    export default {
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                    checkbox_remember_me: false
                }
            }
        },
        computed: {
            validateForm() {
                return !this.errors.any() && this.form.email != '' && this.form.password != '';
            },
        },
        methods: {
            ...mapActions({
                signIn: 'auth/signIn'
            }),
            Login() {
                this.$vs.loading()
                this.signIn(this.form).then(() => {
                        this.$router.replace({
                            name: 'dashboard'
                        })
                    }
                ).catch(() => {
                        console.log('sign in failed')
                        this.form.email = ''
                        this.form.password = ''
                        this.$vs.notify({
                            title: this.$t("Error"),
                            text: this.$t("WrongUsernamePassword"),
                            iconPack: 'feather',
                            icon: 'icon-alert-circle',
                            color: 'danger'
                        })
                    }
                )
                setTimeout(() => {
                    this.$vs.loading.close()
                }, 1000);

                // If user is already logged in notify
                // if (this.$store.state.auth.isUserLoggedIn()) {
                //
                //     // Close animation if passed as payload
                //     // this.$vs.loading.close()
                //
                //     this.$vs.notify({
                //         title: 'Login Attempt',
                //         text: 'You are already logged in!',
                //         iconPack: 'feather',
                //         icon: 'icon-alert-circle',
                //         color: 'warning'
                //     })
                //
                //     return false
                // }
                // return true
            },
        }
    }

</script>

