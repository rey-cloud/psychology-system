<template>
  <div class="container mx-auto p-4">
    <div class="bg-white p-8 border rounded shadow">
      <div class="mb-4 flex items-center justify-between">
        <router-link to="/admin">
          <button class="text-blue-500">&larr; Back</button>
        </router-link>
        <h4 class="text-2xl font-bold">Questions Lists</h4>
        <nuxt-link to="list-of-questions/create" class="text-blue-500">Add Question</nuxt-link>
      </div>
      <div>
        <table class="w-full border-collapse border border-gray-300">
          <thead>
            <tr>
              <th class="p-2 border">ID</th>
              <th class="p-2 border">Question Name</th>
              <th class="p-2 border">Created At</th>
              <th class="p-2 border">Updated At</th>
              <th class="p-2 border">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(question, index) in questions" :key="index">
              <td class="p-2 border align-middle">Q00{{ question.id }}</td>
              <td class="p-2 border align-middle">{{ question.q_name }}</td>
              <td class="p-2 border align-middle">{{ question.created_at }}</td>
              <td class="p-2 border align-middle">{{ question.updated_at }}</td>
              <td class="p-2 border align-middle">
                <NuxtLink to="/" class="text-blue-500 mr-2">View</NuxtLink>
                <NuxtLink :to="`/admin/questions/${question.id}`" class="text-green-500 mr-2">Edit</NuxtLink>
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
  name: "QuestionList",
  data() {
    return {
      questions: [],
    };
  },
  mounted() {
    this.getQuestions();
  },
  methods: {
    getQuestions() {
      axios.get(`http://127.0.0.1:8000/api/questions`).then(res => {
        this.questions = res.data.questions;
      });
    }
  }
};
</script>
  