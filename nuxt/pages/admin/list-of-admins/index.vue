<template>
  <div class="container mx-auto p-4 bg-[#e4e4e4] h-screen">
    <div class="bg-white p-8 border rounded shadow">
      <div class="mb-4 flex items-center justify-between">
        <nuxt-link to="/admin">
          <button
            class="border-2 rounded-md px-3 py-1 bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors text-white">
            &lt; Back
          </button>
        </nuxt-link>
        <h4 class="text-2xl font-bold">Admin Lists</h4>
      </div>
      <div>
        <table class="w-full border-collapse border border-gray-300">
          <thead class="bg-[#92999e]">
            <tr>
              <th class="p-2 border">ID</th>
              <th class="p-2 border">Name</th>
              <th class="p-2 border">Birth Date</th>
              <th class="p-2 border">Gender</th>
              <th class="p-2 border">Phone</th>
              <th class="p-2 border">Address</th>
              <th class="p-2 border">Username</th>
              <th class="p-2 border">Email</th>
              <th class="p-2 border">Password</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(user, index) in state.users" :key="index">
              <td class="p-2 border align-middle">{{ user.id }}</td>
              <td class="p-2 border align-middle">{{ user.first_name }} {{ user.last_name }}</td>
              <td class="p-2 border align-middle">{{ user.birth_date }}</td>
              <td class="p-2 border align-middle">{{ user.gender }}</td>
              <td class="p-2 border align-middle">{{ user.phone }}</td>
              <td class="p-2 border align-middle">{{ user.address }}</td>
              <td class="p-2 border align-middle">{{ user.username }}</td>
              <td class="p-2 border align-middle">{{ user.email }}</td>
              <!-- Assuming you don't want to display the password -->
              <td class="p-2 border align-middle">*** Hidden ***</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive, onMounted } from 'vue';

const state = reactive({
  users: null
});

onMounted(() => {
  fetchUser();
});

async function fetchUser() {
  try {
    const response = await $fetch(`http://127.0.0.1:8000/api/users/admins`, {
      method: 'GET',
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('_token')
      }
    });
    if (response.data) {
      state.users = response.data;
    }
  } catch (error) {
    state.errors = error.response;
    console.log('error', error);
  }
}
</script>

<style scoped>
.router-link-exact-active {
  color: #F0C71C;
}

li:hover {
  opacity: 0.5;
}
</style>
