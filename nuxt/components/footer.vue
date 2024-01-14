<template lang="">
  <footer class="bg-[#4C6195] h-auto w-full text-white lg:px-20 px-5 tracking-wide">
    <div class="pt-5 grid lg:grid-cols-2 grid-cols-1 gap-10 pb-10">
      <section class="">
        <h1 class="font-bold text-xl text-[#FEBD5B]">STI 😎 With Healthy Lifestyle</h1>
        <p class="text-sm mt-3">A healthy and meaningful life requires an emotional state of well-being. It includes the capacity to comprehend, control, and express emotions in a way that has a positive influence on your general quality of life. This manual will examine the numerous facets of emotional health and will arm you with knowledge, techniques, and tools to support and improve your emotional health.</p>
      </section>
      <section class="grid grid-cols-2 gap-10">
        <div>
          <h1 class="font-bold text-xl text-[#FEBD5B]">Support</h1>
          <p class="text-sm mt-3">FAQs</p>
          <p class="text-sm mt-2">Terms & Conditions</p>
          <p class="text-sm mt-2">Contact Us</p>
        </div>
        <div>
          <h1 class="font-bold text-xl text-[#FEBD5B]">Information</h1>
          <p class="text-sm mt-3"><span class="font-bold">Address:</span> 506 J.P. Laurel Ave, Poblacion District, Davao City, 8000 Davao del Sur</p>
          <p class="text-sm mt-2"><span class="font-bold">Email:</span> bscs_sti@gmail.com</p>
          <p class="text-sm mt-2"><span class="font-bold">Phone:</span> +63 9023234</p>
        </div>
      </section>
    </div>
    <div class="text-center pb-10">
      Copyright &copy; {{ currentYear }} | All rights reserved by BSCS501.
    </div>
  </footer>
</template>

<script setup>
const currentYear = ref(new Date().getFullYear());
</script>
