<template>
  <div class="container mx-auto p-4">
    <div class="bg-white p-8 border rounded shadow">
      <div class="mb-4 flex items-center justify-between">
        <router-link to="/admin">
          <button class="text-blue-500">&larr; Back</button>
        </router-link>
        <h4 class="text-2xl font-bold">Admins Lists</h4>
        <nuxt-link to="/admins/create" class="text-blue-500">Add Admin</nuxt-link>
      </div>
      <div>
        <h1>Random Results Page</h1>
        <button @click="generateRandomResult">Generate Random Result</button>
        <p v-if="randomResult">{{ randomResult }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      randomResult: ''
    };
  },
  methods: {
    generateRandomResult() {
      // Replace this with your logic to generate random results
      const results = ['Result 1', 'Result 2', 'Result 3', 'Result 4', 'Result 5'];
      const randomIndex = Math.floor(Math.random() * results.length);
      this.randomResult = results[randomIndex];
    }
  }
};
</script>
