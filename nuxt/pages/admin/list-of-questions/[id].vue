<template>
  <div class="container mx-auto p-4 flex justify-center items-center min-h-screen bg-[#e4e4e4]">
    <div class="max-w-md w-full bg-white p-8 border rounded shadow-md">
      <div class="mb-5 flex justify-between">
        <nuxt-link to="/admin/list-of-questions">
          <button
            class="border-2 rounded-md px-3 py-1 bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors text-white tracking-wide">
            &lt; Back
          </button>
        </nuxt-link>
        <h4 class="text-2xl font-bold">Edit Question</h4>
      </div>

      <form @submit.prevent="updateQuestion">
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Question Title:</label>
          <input type="text" v-model="question.question_title"
            :class="{ 'border-red-500': this.errorList.question_title }" class="mt-1 p-2 border-2 rounded w-full" />
          <div v-if="this.errorList.question_title" class="text-red-500 text-sm font-semibold tracking-wide">{{
            this.errorList.question_title[0] }}</div>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Option 1:</label>
          <input type="text" v-model="question.option_one" :class="{ 'border-red-500': this.errorList.option_one }"
            class="mt-1 p-2 border-2 rounded w-full" />
          <div v-if="this.errorList.option_one" class="text-red-500 text-sm font-semibold tracking-wide">{{
            this.errorList.option_one[0] }}</div>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Option 2:</label>
          <input type="text" v-model="question.option_two" :class="{ 'border-red-500': this.errorList.option_two }"
            class="mt-1 p-2 border-2 rounded w-full" />
          <div v-if="this.errorList.option_two" class="text-red-500 text-sm font-semibold tracking-wide">{{
            this.errorList.option_two[0] }}</div>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Option 3:</label>
          <input type="text" v-model="question.option_three" :class="{ 'border-red-500': this.errorList.option_three }"
            class="mt-1 p-2 border-2 rounded w-full" />
          <div v-if="this.errorList.option_three" class="text-red-500 text-sm font-semibold tracking-wide">{{
            this.errorList.option_three[0] }}</div>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Option 4:</label>
          <input type="text" v-model="question.option_four" :class="{ 'border-red-500': this.errorList.option_four }"
            class="mt-1 p-2 border-2 rounded w-full" />
          <div v-if="this.errorList.option_four" class="text-red-500 text-sm font-semibold tracking-wide">{{
            this.errorList.option_four[0] }}</div>
        </div>
        <div>
          <button type="submit"
            class="border-2 rounded-md px-3 w-full py-1 bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors text-white tracking-wider">Update</button>
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