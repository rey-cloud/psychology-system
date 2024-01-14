<template>
  <div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-white p-8 border rounded shadow">
      <div class="mb-4">
        <h4 class="text-2xl font-bold">Edit Question</h4>
        <nuxt-link to="/admin/list-of-questions" class="text-blue-500">Back</nuxt-link>
      </div>

      <form @submit.prevent="updateQuestion">
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Question Name:</label>
          <span v-if="this.errorList.question_title" class="text-red-500">{{ this.errorList.question_title[0] }}</span>
          <input type="text" v-model="question.question_title" class="mt-1 p-2 border rounded w-full" />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Choice 1:</label>
          <span v-if="this.errorList.option_one" class="text-red-500">{{ this.errorList.option_one[0] }}</span>
          <input type="text" v-model="question.option_one" class="mt-1 p-2 border rounded w-full" />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Choice 2:</label>
          <span v-if="this.errorList.option_two" class="text-red-500">{{ this.errorList.option_two[0] }}</span>
          <input type="text" v-model="question.option_two" class="mt-1 p-2 border rounded w-full" />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Choice 3:</label>
          <span v-if="this.errorList.option_three" class="text-red-500">{{ this.errorList.option_three[0] }}</span>
          <input type="text" v-model="question.option_three" class="mt-1 p-2 border rounded w-full" />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Choice 4:</label>
          <span v-if="this.errorList.option_four" class="text-red-500">{{ this.errorList.option_four[0] }}</span>
          <input type="text" v-model="question.option_four" class="mt-1 p-2 border rounded w-full" />
        </div>
        <div>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "QuestionEdit",
  data() {
    return {
      questionId: '',
      question: {},
      errorList: {}
    };
  },
  mounted() {
    this.questionId = this.$route.params.id;
    this.getQuestion(this.questionId);
  },
  methods: {
    getQuestion(questionId) {
      axios.get(`http://127.0.0.1:8000/api/questions/${questionId}/edit`).then(res => {
        console.log(res);
        this.question = res.data.question;
      });
    },
    updateQuestion() {
      var myThis = this;

      axios.put(`http://127.0.0.1:8000/api/questions/${this.questionId}/edit`, this.question).then(res => {
        console.log(res, 'res');
        alert(res.data.message);

        this.errorList = {}; 

      })
      .catch(function (error) {
        console.log(error, 'errors')

        if (error.response) {
          if (error.response.status == 422) {
            myThis.errorList = error.response.data.errors;
          }
        }
      });
    }
  }
};
</script>