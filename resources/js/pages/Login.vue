<template>
    <div class="flex justify-center flex-col items-center">
        <form @submit.prevent="onSubmit" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" style="width: 500px">
            <div class="mb-4">
                <Input v-model="username" label="Username" type="text" :error="error.username" />

            </div>
            <div class="mb-6">

                <Input v-model="password" label="Password" type="password" :error="error.password" />
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Sign In
                </button>
                <router-link to="/auth/register" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                    Create User
                </router-link>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;isTochukwu. All rights reserved.
        </p>
    </div>
</template>

<script>
    import Input from "../components/Input";
    export default {
        name: "Login",
        components: {Input},
        data: () => {
            return {
                username: "",
                password: "",
                error: {}
            }
        },
        methods: {
            onSubmit(){
                this.error = {};

                if(!this.username.trim()) this.error.username = "Username is required";
                if(!this.password.trim()) this.error.password = "Password is required";

                if(!!this.error) return;
            }
        }
    }
</script>

<style scoped>

</style>
