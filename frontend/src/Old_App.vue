<template>
    <v-app>
        <Login/>
<!--        <Signup/>-->
    </v-app>
</template>

<script>
    import Login from "./views/UserProfile";
    // import Signup from "./components/Auth/Signup";

    export default {
        name: 'App',
        components: {
            Login
            // Signup
        },

        data: () => ({
            //
        }),
    };
</script>
