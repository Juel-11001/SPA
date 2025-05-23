<template>
    <div class="w-1/2 mx-auto items-center">
        <Box>
            <h1 class="text-3xl font-bold mb-5 text-center text-blue-500">New User</h1>
            <hr class="text-gray-200 shadow-sm mb-4">
            <form @submit.prevent="register">
                <div class="">
                    <label class="label mb-3" for="name">Name</label>
                    <input type="text" name="name" v-model="form.name" id="name" class="input mt-3 mb-3">
                    <div class="input-error mt-2" v-if="form.errors.email">{{ form.errors.email }}</div>
                </div>
                <div class="">
                    <label class="label mb-3" for="email">Email</label>
                    <input type="email" name="email" v-model="form.email" id="email" class="input mt-3">
                    <div class="input-error mt-2" v-if="form.errors.email">{{ form.errors.email }}</div>
                </div>
                <div class="">
                    <label class="label mb-3 mt-4" for="password">Password</label>
                    <input type="password" v-model="form.password" name="password" id="password" class="input mt-3">
                    <div class="input-error mt-2" v-if="form.errors.password">{{ form.errors.password }}</div>
                </div>
                <div class="">
                    <label class="label mb-3 mt-4" for="password">Confirm Password</label>
                    <input type="password" v-model="form.password_confirmation" name="password_confirmation" id="password_confirmation" class="input mt-3">
                    <div class="input-error mt-2" v-if="form.errors.password_confirmation">{{ form.errors.password }}</div>
                </div>
                <div class="">
                    <button type="submit" class="btn-primary mt-5 w-full">Register</button>
                </div>
                <div class="mt-3 text-center">
                    <span class="text-gray-500 text-xs">Already have an account ?</span> <Link class="text-gray-600 text-xs font-medium " :href="route('login')"> Log in </Link>
                </div>
            </form>
        </Box>
    </div>
</template>
<script setup>

import Box from "../../Components/Ui/Box.vue";
import {useForm, Link} from "@inertiajs/vue3";
const form=useForm({
    name:null,
    email:null,
    password:null,
    password_confirmation:null
})
const register=()=>{
    form.post(route('register.store'));
}
</script>
