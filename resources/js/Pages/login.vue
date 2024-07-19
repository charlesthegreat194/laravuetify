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

    <div class="  flex flex-col justify-center items-center px-20 mt-20">
        <form @submit.prevent="submit">

            <div class="">

                <v-card class=" " style=" width: 500px;">
                    <v-card-title primary-title class="text-center text-red-500 " style=" ">
                        Sign In
                    </v-card-title>
                   <v-text-field
                    v-model="form.email"

                    label="Email"
                    type="email"
                    required


                   >
                </v-text-field>
                <v-text-field
                    v-model="form.password"
                    label="Password"
                    type="password"

                ></v-text-field>
                <v-divider class="">
                    <v-btn style=" color: white; background-color: #f56565" type="submit">Log In</v-btn>
                </v-divider>
                

                </v-card>
                <!-- <label for="email">Email</label>
                <input type="email"  v-model="form.email">
                <small>{{ form.errors.email }}</small>

            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" v-model="form.password" :message="form.errors.password">
                <small>{{ form.errors.password }}</small>
            </div>
            <div>
                <button>Login</button> -->
            </div>
        </form>



    </div>

</template>
