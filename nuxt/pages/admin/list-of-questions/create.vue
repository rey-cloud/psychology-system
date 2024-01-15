<template>
  <div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-white p-8 border rounded shadow">
      <div class="mb-5 flex justify-between">
        <nuxt-link to="/admin/list-of-questions"><button
            class="border-2 rounded-md px-3 py-1 bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors text-white">
            &lt; Back</button></nuxt-link>
        <h4 class="text-2xl font-bold">New Question</h4>
      </div>

      <form @submit.prevent="saveQuestion">
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Question Name:</label>
          <span v-if="this.errorList.question_title" class="text-red-500">{{ this.errorList.question_title[0] }}</span>
          <input type="text" v-model="question.question_title" class="mt-1 p-2 border rounded w-full" />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Option 1:</label>
          <span v-if="this.errorList.option_one" class="text-red-500">{{ this.errorList.option_one[0] }}</span>
          <input type="text" v-model="question.option_one" class="mt-1 p-2 border rounded w-full" />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Option 2:</label>
          <span v-if="this.errorList.option_two" class="text-red-500">{{ this.errorList.option_two[0] }}</span>
          <input type="text" v-model="question.option_two" class="mt-1 p-2 border rounded w-full" />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Option 3:</label>
          <span v-if="this.errorList.option_three" class="text-red-500">{{ this.errorList.option_three[0] }}</span>
          <input type="text" v-model="question.option_three" class="mt-1 p-2 border rounded w-full" />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Option 4:</label>
          <span v-if="this.errorList.option_four" class="text-red-500">{{ this.errorList.option_four[0] }}</span>
          <input type="text" v-model="question.option_four" class="mt-1 p-2 border rounded w-full" />
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
  name: "QuestionCreate",
  data() {
    return {
      question: {
        question_title: "",
        option_one: "",
        option_two: "",
        option_three: "",
        option_four: ""
      },
      errorList: {}
    };
  },
  methods: {
    saveQuestion() {
      //alert("am here");
      console.log('Data to be sent:', this.question);

      var myThis = this;

      axios.post(`http://127.0.0.1:8000/api/questions`, this.question).then(res => {
        console.log(res, 'res');
        alert(res.data.message);

        this.question.question_title = '';
        this.question.option_one = '';
        this.question.option_two = '';
        this.question.option_three = '';
        this.question.option_four = '';

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

  