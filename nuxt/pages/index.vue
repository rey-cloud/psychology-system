<template>
  <div class="flex items-center justify-center min-h-screen bg-[#e4e4e4]">
    <div class="w-full xl:max-w-screen-xl max-w-screen-lg lg:flex block duration-300 xl:mt-0 mt-20">
      <section class="flex-1 m-auto xl:pl-8 lg:px-0 duration-300 lg:max-w-screen-lg max-w-screen-md px-10">
        <div class="flex justify-center lg:justify-start">
          <img class="rounded-lg w-auto lg:h-[150px] h-[100px] mb-10" src="assets/img/main-logo.png" alt="main-logo" />
        </div>
        <p class="mt-5 tracking-wider px-1 lg:text-lg text-base text-[#4f608a] lg:text-start text-justify">
          Discover Yourself with PsycheAssist! Take easy, insightful tests to
          understand your mind better. Navigate life's ups and downs with
          confidence. Your journey to a happier you starts here!
        </p>
        <div class="flex justify-center lg:justify-start">
          <nuxt-link to="/login">
            <button
              class="mt-5 py-2 px-10 shadow-md tracking-wider rounded-lg hover:bg-[#febd5b] bg-[#5c6f9f] font-semibold text-white hover:text-[#445277] transition duration-300 ease-in-out">
              Let's Go!
            </button>
          </nuxt-link>
        </div>
      </section>
      <section class="flex-1 flex items-center justify-center">
        <img class="lg:h-[700px] w-auto" src="assets/img/landing-page/online_exam.gif" alt="writing" />
      </section>
    </div>
  </div>
</template>

<script setup>

</script>