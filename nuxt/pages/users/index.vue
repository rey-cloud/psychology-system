<template>
    <div class="container mx-auto p-4">
      <div class="bg-white p-8 border rounded shadow">
        <div class="mb-4 flex items-center justify-between">
          <router-link to="/AdminDashboard">
            <button class="text-blue-500">&larr; Back</button>
          </router-link>
          <h4 class="text-2xl font-bold">Users Lists</h4>
          <nuxt-link to="/users/create" class="text-blue-500">Add User</nuxt-link>
        </div>
        <div>
          <table class="w-full border-collapse border border-gray-300">
            <thead>
              <tr>
                <th class="p-2 border">ID</th>
                <th class="p-2 border">User Name</th>
                <th class="p-2 border">Created At</th>
                <th class="p-2 border">Updated At</th>
                <th class="p-2 border">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(user, index) in users" :key="index">
                <td class="p-2 border align-middle">{{ user.id }}</td>
                <td class="p-2 border align-middle">{{ user.username }}</td>
                <td class="p-2 border align-middle">{{ user.created_at }}</td>
                <td class="p-2 border align-middle">{{ user.updated_at }}</td>
                <td class="p-2 border align-middle">
                  <NuxtLink to="/" class="text-blue-500 mr-2">View</NuxtLink>
                  <NuxtLink :to="`/users/${user.id}`" class="text-green-500 mr-2">Edit</NuxtLink>
                  <button type="button" class="text-red-500">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: "UserList",
    data() {
      return {
        users: [],
      };
    },
    mounted() {
      this.getUsers();
    },
    methods: {
      getUsers() {
        axios.get(`http://127.0.0.1:8000/api/users`).then(res => {
          this.users = res.data.users;
        });
      }
    }
  };
  </script>
  