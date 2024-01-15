<template lang="">
  <nav class="tracking-wide text-white">
    <section class="justify-between lg:px-20 px-5 flex h-28 w-full bg-[#4C6195] shadow-lg fixed top-0 z-50">
      <div class="flex">
        <nuxt-link to="/guest" class="m-auto hover:scale-105 duration-300 ease-in-out flex">
          <img class="w-auto h-20 rounded-full hover:shadow-lg" src="/assets/img/guest/main-logo_head.png"alt="logo">
        </nuxt-link>
        <label class="m-auto ml-3 font-semibold tracking-wide">Hello, {{ state.user ? state.user.username : '...' }}!</label>

      </div>
        <div class="flex">
          <ul class="m-auto flex gap-10">
          <li><nuxt-link to="/guest">Home</nuxt-link></li>
          <li><nuxt-link to="/guest/about">About</nuxt-link></li>
          <li><nuxt-link to="/guest/profile">Profile</nuxt-link></li>
        </ul>
      </div>
      <div class="flex">
        <nuxt-link to="/guest/test/taking-test" class="m-auto">
          <button class="m-auto bg-[#FEBD5B] px-7 rounded-lg py-2 hover:bg-[#5c6f9f] shadow-lg font-semibold hover:text-white text-[#445277] transition duration-300 ease-in-out tracking-wider">Take Test!</button>
        </nuxt-link>
      </div>
    </section>
  </nav>
    
  <div class="mt-40">
    <slot />
  </div>
</template>

<script setup>
import "./assets/scroll-bar.css";

const state = reactive({
  user: null
})
onMounted(() => {
  fetchUser()
})

async function fetchUser() {
  try {
    const response = await $fetch(`http://127.0.0.1:8000/api/user`, {
      method: 'GET',
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('_token')
      }
    })
    if (response.data) {
      state.user = response.data
    }
  }
  catch (error) {
    state.errors = error.response
    console.log('error', error)
  }
}

</script>

<style scoped>
.router-link-exact-active {
  color: #F0C71C;
}

li:hover {
  opacity: 0.5;
}
</style>