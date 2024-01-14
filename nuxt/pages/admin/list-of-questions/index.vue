<template>
  <div class="container mx-auto p-4">
    <div class="bg-white p-8 border rounded shadow">
      <div class="mb-4 flex items-center justify-between">
        <h4 class="text-2xl font-bold">Questions Lists</h4>
        <nuxt-link to="/admin/list-of-questions/create" class="text-blue-500">Add Question</nuxt-link>
      </div>
      <div>
        <table class="w-full border-collapse border border-gray-300">
          <thead>
            <tr>
              <th class="p-2 border">ID</th>
              <th class="p-2 border">Question Title</th>
              <th class="p-2 border">Option 1</th>
              <th class="p-2 border">Option 2</th>
              <th class="p-2 border">Option 3</th>
              <th class="p-2 border">Option 4</th>
              <th class="p-2 border">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(question, index) in questions" :key="index">
              <td class="p-2 border align-middle">Q00{{ question.id }}</td>
              <td class="p-2 border align-middle">{{ question.question_title }}</td>
              <td class="p-2 border align-middle">{{ question.option_one }}</td>
              <td class="p-2 border align-middle">{{ question.option_two }}</td>
              <td class="p-2 border align-middle">{{ question.option_three }}</td>
              <td class="p-2 border align-middle">{{ question.option_four }}</td>
              <td class="p-2 border align-middle">
                <NuxtLink :to="`/admin/list-of-questions/${question.id}`" class="text-green-500 mr-2">Edit</NuxtLink>
                <button type="button" @click="$event => deleteQuestion($event, question.id)" class="text-red-500">Delete</button>
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
    },
    deleteQuestion(event, QuestionId) {
      if (confirm('Are you sure, you want to delete this data?')) {
        event.target.innerText = 'Deleting';
        axios.delete(`http://127.0.0.1:8000/api/questions/${QuestionId}/delete`).then(res => {
          event.target.innerText = 'Delete';
          this.getQuestions();
        });
      }
    }
  }
};
</script>
  