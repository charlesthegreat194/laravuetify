<script setup>
    import Header from '../Layouts/Header.vue';

    import {useForm} from '@inertiajs/vue3';

    const form = useForm({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
    })

    const submit=()=>{
        form.post('/register', {
            onError:()=>form.reset('password', 'password_confirmation'),
        });
    }
</script>
<template>

    <Header></Header>
    <div class=" bg-yellow-600 h-screen">
    <form @submit.prevent="submit">
        <div class=" ">
            <label  for="name">Name</label>
            <input type="text"  v-model="form.name">
            <small>{{ form.errors.name }}</small>

        </div>
        <div>
            <label  for="name">Email</label>
            <input type="email" v-model="form.email">
            <small>{{ form.errors.email }}</small>
        </div>
        <div>
            <label  for="name">Password</label>
            <input type="password" v-model="form.password">
            <small>{{ form.errors.password }}</small>
        </div>
        <div>
            <label  for="name">Confirm Password</label>
            <input type="password" v-model="form.password_confirmation">
            <small>{{ form.errors.password_confirmation }}</small>
        </div>
        <div>
            <button>register</button>
        </div>
    </form>


</div>


</template>