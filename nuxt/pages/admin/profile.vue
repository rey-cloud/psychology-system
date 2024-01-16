<template lang="">
   <Title>Profile | Psyche Assist</Title>

<div class="bg-[#e4e4e4] h-screen w-full absolute top-0 flex justify-center">
  <div class="relative lg:px-20 px-5 mb-20 text-white tracking-wide mt-20 w-3/4">
    <div class="justify-between flex mb-3">
      <nuxt-link to="/admin"
      class="border-2 rounded-md px-3 py-1 bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors" id="logout">&lt; Back</nuxt-link>
      <p class="text-[#445277] text-xl font-bold">Admin Profile</p>
      </div>
    <div class="h-auto w-full bg-[#71797f] rounded-md p-5 shadow-md">
      <div class="gap-5">
        <section class="p-5 h-auto w-full rounded-lg bg-[#616a70]">
          <div class="flex justify-between">
            <h1 class="text-xl font-semibold mb-5 text-[#FEBD5B]">User Information</h1>
            <nuxt-link to="/admin/edit">
              <button class="hover:bg-[#9ca5ba] px-7 rounded-lg py-2 bg-[#5c6f9f] text-white hover:text-[#445277] transition duration-300 ease-in-out tracking-wider">Edit</button>
            </nuxt-link>
          </div>
          <div class="flex gap-10">
            <img class="w-auto h-48" src="/assets/img/admin/logo.png" alt="admin-img">
        <section class="mt-5 rounded-md p-5 w-full tracking-wider font-semibold bg-[#82898e] m-auto">
          <p>Name: <span class="font-normal">
              {{ state.user ? capitalize(state.user.first_name) + ' ' + (state.user.middle_initial ? ' ' + capitalize(state.user.middle_initial) + ' ' : '') + ' ' + capitalize(state.user.last_name) : '' }}
          </span></p>
            <p>Gender: <span class="font-normal">{{ state.user && state.user.gender ? capitalize(state.user.gender) : '' }}</span></p>
            <p>Date of Birth: <span class="font-normal">{{ state.user && state.user.birth_date ? date(state.user.birth_date) : '' }}</span></p>
            <p>Phone no: <span class="font-normal">{{ state.user && state.user.phone ? state.user.phone : 'N/A' }}</span></p>
            <p>Address: <span class="font-normal">{{ state.user && state.user.address ? capitalize(state.user.address) : 'N/A' }}</span></p>
        </section>
          </div>
        </section>
        <div class="tracking-wider mt-5">
          <section class="p-5 h-auto w-full bg-[#616a70] rounded-md">
            <div class="flex justify-between">
              <h1 class="text-xl font-semibold text-[#FEBD5B]">Login Credentials</h1>
              <nuxt-link to="/admin/change-password">
                <button class="hover:bg-[#9ca5ba] px-7 rounded-lg py-2 bg-[#5c6f9f] text-white hover:text-[#445277] transition duration-300 ease-in-out tracking-wider">Change Password</button>
              </nuxt-link>
            </div>
            <div class="font-semibold mt-5 p-5 bg-[#82898e] rounded-md">
              <p>Username: <span class="font-normal">{{ state.user && state.user.username ? state.user.username : '' }}</span></p>
              <p>Email: <span class="font-normal">{{ state.user && state.user.email ? state.user.email : '' }}</span></p>
              <p>Date Approved: <span class="font-normal">{{ state.user && state.user.created_at ? date(state.user.created_at) : '' }}</span></p>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>

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

function capitalize(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}

function date(dateString) {
  const options = { year: 'numeric', month: 'short', day: 'numeric' };
  const date = new Date(dateString);
  return date.toLocaleDateString('en-US', options);
}

</script>