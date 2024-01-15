<template>
    <div class="container mx-auto p-4">
      <div class="bg-white p-8 border rounded shadow">
        <div class="mb-4 flex items-center justify-between">
          <h4 class="text-2xl font-bold">Questionnaire</h4>
        </div>
        <div>
          <div v-for="(question, index) in questions" :key="index">
            <div class="mb-4">
              <div class="font-bold">{{ question.question_title }}</div>
              <div v-for="(option, optionIndex) in question.options" :key="optionIndex">
                <input
                  type="radio"
                  :id="`option-${index}-${optionIndex}`"
                  :name="`question-${index}`"
                  :value="option"
                />
                <label :for="`option-${index}-${optionIndex}`">{{ option }}</label>
              </div>
            </div>
          </div>
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
    },
  };
  </script>
  