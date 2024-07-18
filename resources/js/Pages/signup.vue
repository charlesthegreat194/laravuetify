<script setup>
import Header from '../Layouts/Header.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

// Create the form object
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

// Define the submit method
const submit = () => {
    form.post('/register', {
        onError: () => form.reset('password', 'password_confirmation'),
    });
};

// References for Vuetify components
const name = ref('');
const email = ref('');
const password = ref('');
const passwordConfirmation = ref('');
</script>

<template>
    <Header></Header>
    <div class=" px-20">
    <v-container fluid class=" bg-red-500 mt-20 w-80">
        <v-form @submit.prevent="submit">
            <v-text-field
                v-model="form.name"
                label="Name"
                :error-messages="form.errors.name"
                outlined
                dense
            ></v-text-field>

            <v-text-field
                v-model="form.email"
                label="Email"
                type="email"
                :error-messages="form.errors.email"
                outlined
                dense
            ></v-text-field>

            <v-text-field
                v-model="form.password"
                label="Password"
                type="password"
                :error-messages="form.errors.password"
                outlined
                dense
            ></v-text-field>

            <v-text-field
                v-model="form.password_confirmation"
                label="Confirm Password"
                type="password"
                :error-messages="form.errors.password_confirmation"
                outlined
                dense
            ></v-text-field>

            <v-btn class="" type="submit" color=" black">Register</v-btn>
        </v-form>
    </v-container>
    </div>
</template>

<style>
/* Optional: Customize Vuetify components with additional styles */
</style>
