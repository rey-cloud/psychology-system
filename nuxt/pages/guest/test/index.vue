<template>

  <div class="bg-[#878889] h-screen w-full flex items-center justify-center tracking-wide">
    <div class="bg-[#d0d9e7] p-8 rounded-md shadow-md w-1/2">
      <h1 class="text-xl font-bold mb-4">Instruction</h1>
      <p class="text-gray-700 mb-4">Within this test, you will
        encounter a set of
        options or
        choices. Your
        task
        is
        to carefully
        evaluate each option
        and select the one that best aligns with your current mental state. Choose the option that feels most
        suitable to you at the moment. Good luck!</p>
      <h1 class="text-xl font-bold mb-4">Proceed to Questions?</h1>
      <div class=" justify-center flex gap-5">
        <nuxt-link
          class="py-2 px-4 shadow-md tracking-wider rounded-md bg-[#B9E0A5] hover:opacity-75 font-semibold text-[#002951] transition duration-300 ease-in-out"
          to="/guest/test/taking">Yes</nuxt-link>
        <nuxt-link
          class="py-2 px-4 shadow-md tracking-wider rounded-md bg-[#FF9999] hover:opacity-75 font-semibold text-[#002951] transition duration-300 ease-in-out"
          to="/guest">No</nuxt-link>
      </div>
    </div>
  </div>
</template>
<script>
export default {

}
</script>
<style lang="">
  
</style>