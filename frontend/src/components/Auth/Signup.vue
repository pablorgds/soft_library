<template>
    <v-app>
        <v-main>
            <v-container fluid class="fill-height bg">
                <v-row align="center" justify="center">
                    <v-col cols="12" sm="8" md="4">
                        <v-card elevation="12" max-width="500px" class="mx-auto">
                            <v-toolbar color="red" dark flat>
                                <v-toolbar-title>Cadastre-se</v-toolbar-title>
                            </v-toolbar>
                            <v-card-text>
                                <v-form>
                                    <v-alert :value="true" color="error" icon="mdi-warning" dark>
                                        Usuário já esxiste, tente um nome de usuário diferente.
                                    </v-alert>
                                    <v-row no-gutters>
                                        <v-text-field
                                                label="Nome"
                                                name="name"
                                                type="text"
                                        ></v-text-field>
                                        <v-text-field
                                                label="Sobrenome"
                                                name="lastname"
                                                type="text"
                                        ></v-text-field>
                                    </v-row>
                                    <v-text-field
                                            label="Email"
                                            name="email"
                                            type="email"
                                            prepend-icon="mdi-mail"
                                    ></v-text-field>
                                    <v-text-field
                                            label="Login"
                                            name="login"
                                            type="text"
                                            prepend-icon="mdi-account"
                                    ></v-text-field>
                                    <v-text-field
                                            label="Password"
                                            name="password"
                                            type="password"
                                            prepend-icon="mdi-lock"
                                    ></v-text-field>
                                </v-form>
                            </v-card-text>
                            <v-card-actions>
                                <v-btn color="blue" dark>Cadastrar</v-btn>
                                <v-spacer/>
                                <v-btn color="green" dark @click="login">Entrar</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
    export default {
        name: "Login",
        data: () => {
            return {
                image_src: require("@/assets/login.jpg")
            };
        },
        methods: {
            login: () => {
                alert("login")
            },
        }
    };
</script>

<style scoped>

</style>