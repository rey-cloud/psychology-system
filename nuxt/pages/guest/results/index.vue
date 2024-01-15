<template lang="">
  <div class=" bg-gray-300 h-auto w-full py-20">
    <div class="flex justify-center mb-5">
      <div class="flex justify-between items-center w-3/4">
        <nuxt-link to="/guest">
          <button class="hover:bg-[#9ca5ba] px-7 rounded-lg py-2 bg-[#5c6f9f] text-white hover:text-[#445277] transition duration-300 ease-in-out tracking-wider">&lt; Back</button>
        </nuxt-link>
        <div class="flex gap-5">
          <nuxt-link to="">
          < Prev
        </nuxt-link to="">
        <nuxt-link>
          Next >
        </nuxt-link>
        </div>
      </div>
    </div>
    <div class="flex items-center justify-center">
      <div class="w-3/4 h-auto p-16 bg-white">
        <section class="flex justify-between">
          <img class="w-auto h-32 rounded-md" src="/assets/img/main-logo.png" alt="logo">
          <p class="font-bold text-2xl text-[]">BSCS501 | STI</p>
        </section>
      </div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>