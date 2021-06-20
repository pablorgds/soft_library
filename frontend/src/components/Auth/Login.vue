<!--<template>-->
<!--    <v-app>-->
<!--        <v-main>-->
<!--            <v-container fluid class="fill-height bg">-->
<!--                <v-row align="center" justify="center">-->
<!--                    <v-col cols="12" sm="8" md="4">-->
<!--                        <v-card elevation="12" max-width="500px" class="mx-auto">-->
<!--                            <v-toolbar color="red" dark flat>-->
<!--                                <v-toolbar-title>Controle de Acesso</v-toolbar-title>-->
<!--                            </v-toolbar>-->
<!--                            <v-img :src="image_src" aspect-ratio="1.5" position="center" contain align="center"></v-img>-->
<!--                            <v-card-text>-->
<!--                                <v-form>-->
<!--                                    <v-text-field-->
<!--                                            label="Login"-->
<!--                                            name="login"-->
<!--                                            type="text"-->
<!--                                            prepend-icon="mdi-account"-->
<!--                                    ></v-text-field>-->
<!--                                    <v-text-field-->
<!--                                            label="Password"-->
<!--                                            name="password"-->
<!--                                            type="password"-->
<!--                                            prepend-icon="mdi-lock"-->
<!--                                    ></v-text-field>-->
<!--                                </v-form>-->
<!--                            </v-card-text>-->
<!--                            <v-card-actions>-->
<!--                                <v-btn color="blue" dark>Cadastrar</v-btn>-->
<!--                                <v-spacer/>-->
<!--                                <v-btn color="green" dark @click="login">Entrar</v-btn>-->
<!--                            </v-card-actions>-->
<!--                        </v-card>-->
<!--                    </v-col>-->
<!--                </v-row>-->
<!--            </v-container>-->
<!--        </v-main>-->
<!--    </v-app>-->
<!--</template>-->

<!--<script>-->
<!--    export default {-->
<!--        name: "Login",-->
<!--        data: () => {-->
<!--            return {-->
<!--                image_src: require("@/assets/login.jpg")-->
<!--            };-->
<!--        },-->
<!--        methods: {-->
<!--            login: () => {-->
<!--                alert("login")-->
<!--            },-->
<!--        }-->
<!--    };-->
<!--</script>-->

<!--<style scoped>-->

<!--</style>-->

<template>
    <!--    <section class="section-container">-->
    <v-container fluid class="fill-height bg">
        <v-card class="d-flex align-content-center flex-wrap fill-height col-12">
            <v-card class="d-none d-sm-flex flex-column pa-6 col-6">
                <h1 class="pa-2">Seja bem vindo ao Bleep Chat</h1>
                <p class="pa-2">Nunca mais perca um cliente por falta de atendimento</p>
            </v-card>
            <v-card class="col-4 pa-6">
                <h2>ENTRAR</h2>
                <validation-observer ref="observer">
                    <v-form @submit.prevent="submit">
                        <validation-provider v-slot="{ errors }" name="Name" rules="required|email">
                            <v-text-field
                                    v-model="email"
                                    :error-messages="errors"
                                    label="Email"
                                    required
                                    outlined
                                    dark
                                    filled
                                    dense
                            ></v-text-field>
                        </validation-provider>
                        <validation-provider v-slot="{ errors }" name="email" rules="required">
                            <v-text-field
                                    v-model="password"
                                    :error-messages="errors"
                                    label="Password"
                                    :append-icon="showPass ? 'mdi-eye' : 'mdi-eye-off'"
                                    @click:append="showPass = !showPass"
                                    required
                                    outlined
                                    dense
                                    dark
                                    filled
                                    :type="showPass ? 'text' : 'password'"
                            ></v-text-field>
                        </validation-provider>
                        <div class="text-center">
                            <v-btn class="signin-btn" type="submit" rounded color="white" dark>
                                Sign In
                            </v-btn>
                        </div>
                    </v-form>
                </validation-observer>
            </v-card>
        </v-card>
    </v-container>

    <!--        <v-row class="signin">-->
    <!--            <v-col cols="4" class="right">-->

    <!--            </v-col>-->
    <!--        </v-row>-->
    <!--    </section>-->
</template>

<script>
    import {required, email} from 'vee-validate/dist/rules'
    import {extend, ValidationProvider, setInteractionMode, ValidationObserver} from 'vee-validate'

    setInteractionMode('eager')

    extend('required', {
        ...required,
        message: '{_field_} não pode ser vazio'
    })

    extend('email', {
        ...email,
        message: 'Email inválido'
    })

    export default {
        components: {
            ValidationProvider,
            ValidationObserver
        },
        data: () => ({
            email: '',
            password: null,
            showPass: false
        }),
        computed: {
            params() {
                return {
                    email: this.email,
                    password: this.password
                }
            }
        },
        methods: {
            async submit() {
                const valid = await this.$refs.observer.validate()
                if (valid) {
                    this.login(this.params)
                }
            },
            clear() {
                this.email = ''
                this.password = null
                this.$refs.observer.reset()
            }
        }
    }
</script>