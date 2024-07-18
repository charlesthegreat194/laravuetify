<script setup>
    import Header from '../Layouts/Header.vue';
    import { useForm } from '@inertiajs/vue3';

    const form = useForm({
        email: null,
        password: null,
    });
    const submit=()=>{
        form.post('/login', {
            onError:()=>form.reset('password', 'password_confirmation'),
        });
    }



</script>

<template>
    <Header></Header>

    <div class=" bg-yellow-500 flex flex-col justify-center">
        <form @submit.prevent="submit">
            <h1 class=" text-blue-500 tex">Log in Bai</h1>
            <div>
                <label for="email">Email</label>
                <input type="email"  v-model="form.email">
                <small>{{ form.errors.email }}</small>

            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" v-model="form.password" :message="form.errors.password">
                <small>{{ form.errors.password }}</small>
            </div>
            <div>
                <button>Login</button>
            </div>
        </form>


        <v-container grid-list-md vm>
            <v-card color="primary">
                <v-form >
                    <h1>h1</h1>
                </v-form>

            </v-card>
        </v-container>
    </div>

</template>
