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

    <div class=" space-x-20 flex flex-row px-20  items-center justify-center mt-20">
        <div class= " font-anton">
            <!-- for slogan -->
            <h1 class=" text-white text-6xl">Register <span class=" text-red-500 text-6xl">Now!</span></h1>
        </div>

        <div class="">

    <form @submit.prevent="submit">

        <v-card class="bg-light-blue-50" style="width: 500px; background-color: white;">
    <v-card-title primary-title class="text-center" style="color: red; font-size: 32px;">
      Sign Up
    </v-card-title>

    <v-text-field
      v-model="form.name"
      label="Name"
      required
      :error-messages="form.errors.name"
      @input="$v.form.name.$touch()"
      class="my-2"
      outlined
    ></v-text-field>
    <v-text-field
      v-model="form.email"
      label="Email"
      type="email"
      required
      :error-messages="form.errors.email"
      @input="$v.form.email.$touch()"
      class="my-2"
      outlined
    ></v-text-field>
    <v-text-field
      v-model="form.password"
      label="Password"
      type="password"
      required
      :error-messages="form.errors.password"
      @input="$v.form.password.$touch()"
      class="my-2"
      outlined
    ></v-text-field>
    <v-text-field
      v-model="form.password_confirmation"
      label="Confirm Password"
      type="password"
      required
      :error-messages="form.errors.password_confirmation"
      @input="$v.form.password_confirmation.$touch()"
      class="my-2"
      outlined
    ></v-text-field>
      <v-divider>
    <v-btn type="submit" class="mt-4 bg-red-500" style=" color: white; background-color: #f56565">Register</v-btn>
    </v-divider>
  </v-card>
    </form>

</div>

</div>

</template>


