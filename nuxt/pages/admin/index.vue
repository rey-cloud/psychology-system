<template lang="html">
  <div class="lg:h-screen h-auto w-full bg-[#d1d3d6] tracking-wide text-white absolute">
    <nav class="">
      <section class="justify-between px-20 flex h-32 w-full bg-[#2c3840] shadow-lg fixed top-0 z-50">
        <div class="flex">
          <nuxt-link to="/admin/profile" class="m-auto hover:scale-110 duration-300 ease-in-out">
            <img class="w-auto h-16" src="/assets/img/admin/logo.png" alt="admin">
            <div class="block text-[9px] text-center">
              view profile
            </div>
          </nuxt-link>
          <p class="m-auto ml-3">Welcome, Admin!</p>
        </div>
        <div class="flex">
          <button @click="Logout" class="m-auto border px-3 py-2 hover:bg-[#a4aaad] hover:text-[#2c3840] rounded-lg flex"
            id="logout">Log
            out
          </button>
        </div>
      </section>
    </nav>

    <section class=" mt-44 px-20 mb-16">

      {{ state.user }}

      <div class="mb-8">
        <button
          class="border-2 rounded-md px-3 py-1 bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors">&plus;
          New Admin</button>
      </div>

      <div class="gap-5 grid grid-cols-1 lg:grid-cols-3 sm:grid-cols-2">
        <nuxt-link to="/admin/list-of-users"
          class="w-full flex h-32 p-5 border-2 rounded-lg bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors">
          <div class="flex">
            <img class="w-auto h-16 mr-5 m-auto" src="/assets/img/admin/users.png" alt="">
            <p class="m-auto font-bold">Users: <span class="text-green-500 text-xl">0</span></p>
          </div>
        </nuxt-link>
        <nuxt-link to="/admin/list-of-admins"
          class="w-full flex h-32 p-5 border-2 rounded-lg bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors">
          <div class="flex">
            <img class="w-auto h-16 mr-5 m-auto" src="/assets/img/admin/admins.png" alt="">
            <p class="m-auto font-bold">Admins: <span class="text-green-500 text-xl">0</span></p>
          </div>
        </nuxt-link>
        <nuxt-link to="/admin/list-of-results"
          class="w-full flex h-32 p-5 border-2 rounded-lg bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors">
          <div class="flex">
            <img class="w-auto h-16 mr-5 m-auto" src="/assets/img/admin/results.png" alt="">
            <p class="m-auto font-bold">Total Results: <span class="text-green-500 text-xl">0</span></p>
          </div>
        </nuxt-link>
        <nuxt-link to="/admin/list-of-questions"
          class="w-full flex h-32 p-5 border-2 rounded-lg bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors">
          <div class="flex">
            <img class="w-auto h-16 mr-5 m-auto" src="/assets/img/admin/questions.png" alt="">
            <p class="m-auto font-bold">Questions: <span class="text-green-500 text-xl">(here goes retrieval)</span></p>
          </div>
        </nuxt-link>
        <nuxt-link to="/admin/list-of-diagnosis"
          class="w-full flex h-32 p-5 border-2 rounded-lg bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors">
          <div class="flex">
            <img class="w-auto h-16 mr-5 m-auto" src="/assets/img/admin/diagnosis.png" alt="">
            <p class="m-auto font-bold">Diagnosis: <span class="text-green-500 text-xl">0</span></p>
          </div>
        </nuxt-link>
        <nuxt-link to="/admin/list-of-terms"
          class="w-full flex h-32 p-5 border-2 rounded-lg bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors">
          <div class="flex">
            <img class="w-auto h-16 mr-5 m-auto" src="/assets/img/admin/terms.png" alt="">
            <p class="m-auto font-bold">Terms: <span class="text-green-500 text-xl">0</span></p>
          </div>
        </nuxt-link>
      </div>
    </section>
  </div>
</template>

<script setup>

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

async function Logout() {
  try {
    const response = await $fetch(`http://127.0.0.1:8000/api/logout`, {
      method: 'POST',
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('_token')
      }
    })
    if (response) {
      localStorage.removeItem('_token')
      navigateTo('/')
    }
  }
  catch (error) {
    state.errors = error.response
    console.log('error', error)
  }
}

</script>
