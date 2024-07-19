<script setup>
import DashboardHeader from "../Layouts/DashboardHeader.vue";
import { defineProps } from "vue";

import axios from "axios";

// render user data in arry
const props = defineProps({
    users: {
        type: Array,
        required: true,
    }
});

// date
const takeDate = (date)=>
new Date(date).toLocaleDateString("en-us",{
    year: "numeric",
    month: "long",
    day: "numeric",
});

// delete user function
const deleteUser = async(id)=>{
    try{
        await axios.delete('/api/users/${id}');
        props.users.data = props.users.data.filter(user => user.id !== userId);
    } catch (error){
        console.error("There was an error deleting the user!", error);
    }
};

const updateUser =  async(user) =>{
    try{
        const response = await axios.put('api/users/$user.id', {
            name: user.name, email: user.email
        });
        const index = props.users.data.findIndex(u => u.id === user.id);
         if(index !== -1){
            props.users.data[index] = response.data;
         }
    } catch (error){
        console.error("There was an error editing!", error);
    }
    
};

</script>

<template>
    <DashboardHeader></DashboardHeader>

    <h1 class="text-white">Welcome to your dashboard</h1>

<div class="text-green-500 bg-yellow-500 px-32">
    <!-- Additional content here -->
</div>

<div class="text-white px-20 mt-20">
    <table class="min-w-full divide-y divide-red-500  ">
        <thead class="bg-gray-800"  >
            <tr class=" text-center">

                <th class="px-6 py-3 text-xs font-medium text-red-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3  text-xs font-medium text-red-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3  text-xs font-medium text-red-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3  text-xs font-medium text-red-500 uppercase tracking-wider">Date Created</th>
                <th class="px-6 py-3  text-xs font-medium text-red-500 uppercase tracking-wider">Action</th>
                
                <!-- Optional: <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Password</th> -->
            </tr>
        </thead>
        <tbody class="bg-gray-700 divide-y divide-gray-600">
            <tr class=" text-white text-center" v-for="user in users.data" :key="user.id">
                <td >{{ user.id }}</td>
                <td >{{ user.name }}</td>
                <td >{{ user.email }}</td>
                <td >{{ takeDate(user.created_at)}}</td>
                <td class=" space-x-12"> 
                    <button @click="updateUser(user)">Edit</button>
                    <button @click="deleteUser(user.id)">Delete</button>
                </td>

                <!-- Optional: <td class="px-6 py-4 text-sm text-gray-300">{{ user.password }}</td> -->
            </tr>
        </tbody>
    </table>
</div> 
</template>
