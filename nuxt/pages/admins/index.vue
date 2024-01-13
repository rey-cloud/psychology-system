<template>
  <div class="container mx-auto p-4">
    <div class="bg-white p-8 border rounded shadow">
      <div class="mb-4 flex items-center justify-between">
        <router-link to="/AdminDashboard">
          <button class="text-blue-500">&larr; Back</button>
        </router-link>
        <h4 class="text-2xl font-bold">Admins Lists</h4>
        <nuxt-link to="/admins/create" class="text-blue-500">Add Admin</nuxt-link>
      </div>
      <div>
        <table class="w-full border-collapse border border-gray-300">
          <thead>
            <tr>
              <th class="p-2 border">ID</th>
              <th class="p-2 border">Admin Name</th>
              <th class="p-2 border">Created At</th>
              <th class="p-2 border">Updated At</th>
              <th class="p-2 border">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(admin, index) in admins" :key="index">
              <td class="p-2 border align-middle">{{ admin.id }}</td>
              <td class="p-2 border align-middle">{{ admin.admin_name }}</td>
              <td class="p-2 border align-middle">{{ admin.created_at }}</td>
              <td class="p-2 border align-middle">{{ admin.updated_at }}</td>
              <td class="p-2 border align-middle">
                <NuxtLink to="/" class="text-blue-500 mr-2">View</NuxtLink>
                <NuxtLink :to="`/admins/${admin.id}`" class="text-green-500 mr-2">Edit</NuxtLink>
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
  name: "AdminList",
  data() {
    return {
      admins: [],
    };
  },
  mounted() {
    this.getAdmins();
  },
  methods: {
    getAdmins() {
      axios.get(`http://127.0.0.1:8000/api/admins`).then(res => {
        this.admins = res.data.admins;
      });
    }
  }
};
</script>

  