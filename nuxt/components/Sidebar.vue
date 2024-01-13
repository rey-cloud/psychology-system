<!-- components/Sidebar.vue -->
<template>
  <aside class="flex-shrink-0">
    <!-- Sidebar content goes here -->
    <div class="p-4 flex flex-col h-full">
      <h2 class="text-xl font-semibold text-white">Admin Sidebar</h2>
      <!-- Sidebar links -->
      <nav class="mt-4">
        <ul>
          <li><router-link to="/users" class="text-white">Users</router-link></li>
          <li><router-link to="/questions" class="text-white">Questions</router-link></li>
          <li><router-link to="/results" class="text-white">Results</router-link></li>
          <li><router-link to="/admins" class="text-white">Admins</router-link></li>
          <!-- Add more links as needed -->
        </ul>
      </nav>
      <!-- Logout link and Profile link at the bottom -->
      <div class="flex-grow"></div>
      <div>
        <router-link to="/profile" class="text-white">Profile</router-link>
      </div>
      <div class="mt-2">
        <button @click="logout" class="text-white">Logout</button>
      </div>
    </div>
  </aside>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

const logout = () => {
  // Implement your logout logic here
  // For example, redirect to the login page
  router.push('/login');
};
</script>
