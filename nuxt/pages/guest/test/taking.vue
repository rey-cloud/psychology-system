<template lang="">
  <Title>Taking Test | Psyche Assist</Title>
  <div class="h-full w-full flex items-center justify-center tracking-wider text-white">
    <div class="bg-[#6c6e6f] p-8 rounded-md shadow-md w-3/4 mt-20 mb-20">
      <h1 class="text-center text-[#FEBD5B] font-bold text-3xl">Self-report Questionnaire</h1>
      <p class="text-center text-white">Beck Depression Inventory (BDI)</p>
      <h1 class="font-bold text-lg text-[#FEBD5B] mt-10">Instruction</h1>
      <p class="text-sm">Answering all questions is required before exiting this page. Leaving without completing the questions will result in non-submission.</p>

      <hr class="mt-5 mb-5">
      
      <h1 class="mt-5 font-semibold">Question 1 here</h1>

      <!-- Radio buttons for choices -->
      <div class="mt-3 text-sm">
        <label class="flex items-center">
          <input type="radio" name="question1" value="choice1" class="mr-2">
          Choice 1
        </label>

        <label class="flex items-center">
          <input type="radio" name="question1" value="choice2" class="mr-2">
          Choice 2
        </label>

        <label class="flex items-center">
          <input type="radio" name="question1" value="choice3" class="mr-2">
          Choice 3
        </label>

        <label class="flex items-center">
          <input type="radio" name="question1" value="choice4" class="mr-2">
          Choice 4
        </label>
      </div>



      <hr class="mt-20 mb-5">
      
      <button @click="confirmSubmit" class="hover:bg-[#FEBD5B] px-7 rounded-lg py-2 bg-[#5c6f9f] shadow-lg font-semibold text-white hover:text-[#445277] transition duration-300 ease-in-out tracking-wider">Submit</button>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const confirmSubmit = () => {
  const isConfirmed = window.confirm('Are you sure you want to submit the form?');

  if (isConfirmed) {
    // Your submission logic goes here
    console.log('Form submitted!');
  }
}
</script>

<style lang="">
  
</style>
