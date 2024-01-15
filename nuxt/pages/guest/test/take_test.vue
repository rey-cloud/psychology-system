<template>
    <div class="container mx-auto p-4">
      <div class="bg-[#6c6e6f] p-8 border rounded-md shadow-md">
        <div class="mb-4 flex items-center justify-between">
          <h4 class="text-[#FEBD5B] font-bold text-2xl">Self-report Questionnaire</h4>
        </div>
        <div>
          <h1 class="text-center text-[#FEBD5B] font-bold text-3xl">Beck Depression Inventory (BDI)</h1>
          <h1 class="font-bold text-lg text-[#FEBD5B] mt-10">Instruction</h1>
          <p class="text-sm">Answering all questions is required before exiting this page. Leaving without completing the questions will result in non-submission.</p>
          <hr class="mt-5 mb-5">
  
          <div v-for="(question, index) in questions" :key="index" class="mb-4">
            <div class="font-bold">{{ question.question_title }}</div>
            <div class="mt-3 text-sm">
              <label v-for="(option, optionIndex) in question.options" :key="optionIndex" class="flex items-center">
                <input
                  type="radio"
                  :id="`option-${index}-${optionIndex}`"
                  :name="`question-${index}`"
                  :value="option"
                  class="mr-2"
                />
                {{ option }}
              </label>
            </div>
          </div>
  
          <hr class="mt-20 mb-5">
  
          <button @click="confirmSubmit" class="hover:bg-[#FEBD5B] px-7 rounded-lg py-2 bg-[#5c6f9f] shadow-lg font-semibold text-white hover:text-[#445277] transition duration-300 ease-in-out tracking-wider">Submit</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
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
          this.questions = res.data.questions.map(question => ({
            ...question,
            options: [
              question.option_one,
              question.option_two,
              question.option_three,
              question.option_four,
            ],
          }));
        });
      },
      confirmSubmit() {
        const isConfirmed = window.confirm('Are you sure you want to submit the form?');
  
        if (isConfirmed) {
          // Your submission logic goes here
          console.log('Form submitted!');
        }
      },
    },
  };
  </script>
  
  <style>
  /* Add any custom styles here if needed */
  </style>
  