<template>
  <div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-white p-8 border rounded shadow">
      <div class="mb-4">
        <h4 class="text-2xl font-bold">Edit Question</h4>
        <nuxt-link to="/admin/questions" class="text-blue-500">Back</nuxt-link>
      </div>

      <form @submit.prevent="saveQuestion">
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Question Name:</label>
          <span v-if="this.errorList.q_name" class="text-red-500">{{ this.errorList.q_name[0] }}</span>
          <input type="text" v-model="question.q_name" class="mt-1 p-2 border rounded w-full" />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Choice 1:</label>
          <span v-if="this.errorList.q_1" class="text-red-500">{{ this.errorList.q_1[0] }}</span>
          <input type="text" v-model="question.q_1" class="mt-1 p-2 border rounded w-full" />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Choice 2:</label>
          <span v-if="this.errorList.q_2" class="text-red-500">{{ this.errorList.q_2[0] }}</span>
          <input type="text" v-model="question.q_2" class="mt-1 p-2 border rounded w-full" />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Choice 3:</label>
          <span v-if="this.errorList.q_3" class="text-red-500">{{ this.errorList.q_3[0] }}</span>
          <input type="text" v-model="question.q_3" class="mt-1 p-2 border rounded w-full" />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Choice 4:</label>
          <span v-if="this.errorList.q_4" class="text-red-500">{{ this.errorList.q_4[0] }}</span>
          <input type="text" v-model="question.q_4" class="mt-1 p-2 border rounded w-full" />
        </div>
        <div>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
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
    this.questionId = this.$route.params.id
    //alert(this.questionId);

    this.getQuestion(this.questionId);
  },
  methods: {

    getQuestion(questionId) {
      axios.get(`http://127.0.0.1:8000/api/questions/${questionId}/edit`).then(res => {
        console.log(res);
        this.question = res.data.question;
      });
    },

    saveQuestion() {
      //alert("am here");

      var myThis = this;

      axios.post(`http://127.0.0.1:8000/api/questions`, this.question).then(res => {
        console.log(res, 'res');
        alert(res.data.message);

        this.question.q_name = '';
        this.question.q_1 = '';
        this.question.q_2 = '';
        this.question.q_3 = '';
        this.question.q_4 = '';

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
