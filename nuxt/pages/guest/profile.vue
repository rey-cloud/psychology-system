<template lang="">
  <Title>Profile | Psyche Assist</Title>

  <div class="bg-[#e4e4e4] h-auto w-full absolute top-0">

    <Navbar />

    <div class="relative lg:px-20 px-5 mb-20 text-white tracking-wide">
      {{ state.user }}
      <div class="justify-between flex mb-3">
        <p class="text-[#445277] text-xl font-bold">Guest Profile</p>
          <button @click="Logout"
            class="px-3 py-2 bg-[#ff7765] hover:opacity-70 rounded-lg shadow-lg tracking-wider" id="logout">Log
            out
          </button>
        </div>
      <div class="h-auto w-full bg-[#808dad] rounded-md p-5 shadow-md">
        <div class="grid grid-cols-2 gap-5">
          <section class="p-5 h-auto w-full rounded-lg bg-[#78839f]">
            <div class="flex justify-between">
              <h1 class="text-xl font-semibold mb-5 text-[#FEBD5B]">User Information</h1>
              <nuxt-link to="/guest/edit">
                <button class="hover:bg-[#9ca5ba] px-7 rounded-lg py-2 bg-[#5c6f9f] text-white hover:text-[#445277] transition duration-300 ease-in-out tracking-wider">Edit</button>
              </nuxt-link>
            </div>
            <img class="w-auto h-52 m-auto" src="/assets/img/guest/user.png" alt="user-img">
            <section class="mt-5 rounded-md p-5 tracking-wider font-semibold bg-[#8a94ac]">
              <p>Name: <span class="font-normal">fname + mid. + lname</span></p>
              <p>Gender: <span class="font-normal">male / female</span></p>
              <p>Date of Birth: <span class="font-normal">yyyy-mm-dd</span></p>
              <p>Date of Birth: <span class="font-normal">yyyy-mm-dd</span></p>
            </section>
          </section>
          <div class="tracking-wider">
            <section class="p-5 h-auto w-full bg-[#78839f] rounded-md">
              <div class="flex justify-between">
                <h1 class="text-xl font-semibold text-[#FEBD5B]">Assessment</h1>
                <nuxt-link to="/guest/results">
                  <button class="hover:bg-[#9ca5ba] px-7 rounded-lg py-2 bg-[#5c6f9f] text-white hover:text-[#445277] transition duration-300 ease-in-out tracking-wider">View Results</button>
                </nuxt-link>
              </div>
              <div class="font-semibold mt-5 p-5 bg-[#8a94ac] rounded-md">
                <p>Total Results:<span class="ml-2 font-normal">0</span></p>
                <p>Current Diagnosis:<span class="ml-2 font-normal">Deep Freeze</span></p>
                <p>Last Date Taken:<span class="ml-2 font-normal">2023-12-06 13:00:54</span></p>
              </div>
            </section>
            <section class="p-10 h-auto border rounded-md mt-5">
              <p></p>
            </section>
          </div>
        </div>
      </div>
    </div>

    <Footer />

  </div>

</template>

<script setup>
import Navbar from '~/components/navbar.vue';
import Footer from '~/components/footer.vue';

const state = reactive({
    user: null
})
    onMounted(()=>{
        fetchUser()
    })

    async function fetchUser(){
    try{
        const response = await $fetch(`http://127.0.0.1:8000/api/user`, {
        method: 'GET',
        headers:{
            'Authorization': 'Bearer ' + localStorage.getItem('_token')
        }
        })
        if(response.data){
            state.user = response.data
        }
        }
    catch(error){
        state.errors = error.response
        console.log('error', error)
    }
    }

    async function Logout(){
        try{
        const response = await $fetch(`http://127.0.0.1:8000/api/logout`, {
        method: 'POST',
        headers:{
            'Authorization': 'Bearer ' + localStorage.getItem('_token')
            }
        })
        if(response){
            localStorage.removeItem('_token')
            navigateTo('/')
        }
        }
    catch(error){
        state.errors = error.response
        console.log('error', error)
    }
    }
</script>