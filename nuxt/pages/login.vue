<template>
    <div class="fixed inset-0 flex items-center justify-center z-50">
      <div class="bg-black opacity-40 fixed inset-0"></div>
      <div class="bg-[#d0d9e7] rounded-lg relative z-10 p-6 overflow-y-scroll block max-h-[85%]">
        <nuxt-link to="/">
          <button
            class="cursor-pointer text-xl font-bold absolute top-2 right-2 text-gray-500 px-2 rounded-md hover:bg-red-400 hover:text-white">
            &times;
          </button>
        </nuxt-link>
        <!-- Switch button -->
        <section class="mt-6 mb-3 cursor-default font-semibold text-gray-800 text-lg flex justify-between">
          <div class="flex items-center">
            <img class="w-auto h-6 mr-1" src="assets/img/forms/login.png" alt="login" />
            <h1 class="py-2 text-start font-bold">Login</h1>
          </div>
          <div class="flex justify-center">
            <button @click="switchToLoginForm('guestLogin')" :class="{
              'cursor-pointer bg-[#5c6f9f] text-white px-4 py-2 rounded-s-lg border-s-2 border-y-2 tracking-wider':
                activeForm === 'guestLogin',
              'cursor-pointer px-4 py-2 rounded-s-lg border-s-2 border-y-2 tracking-wider text-gray-800':
                activeForm !== 'guestLogin',
            }">
              Guest
            </button>
            <button @click="switchToLoginForm('adminLogin')" :class="{
              'cursor-pointer bg-[#5c6f9f] text-white px-4 py-2 rounded-e-lg border-e-2 border-y-2  tracking-wider':
                activeForm === 'adminLogin',
              'cursor-pointer px-4 py-2 rounded-e-lg border-e-2 border-y-2 tracking-wider text-gray-800':
                activeForm !== 'adminLogin',
            }">
              Admin
            </button>
          </div>
        </section>
  
        <!-- Guest Login Form -->
        <form @submit.prevent="Login">

            <section id="guestLogin" v-if="activeForm === 'guestLogin'">
              <section class="w-[350px] lg:w-[500px] mx-auto duration-300">
                <div class="lg:flex block duration-300">
                  <label class="mr-2 text-gray-800">Username:</label>
                </div>
                <div class="text-red-500" v-if="state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.username">

                    {{ state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.username && state.errors._data.errors.username[0]}}
                </div>
                <input
                    v-model="state.user.username"
                    class="w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-1"
                    type="text" name="username_guest" placeholder="*" />
                <div class="flex justify-between">
                  <div class="lg:flex block duration-300">
                    <label class="mr-2 text-gray-800">Password:</label>
                  </div>

                  <div class="text-red-500" v-if="state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.username">
                    
                    {{ state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.password && state.errors._data.errors.password[0]}}
                  </div>
                  <span @mouseover="showPassword" @mouseout="hidePassword">
                    <img class="w-auto h-5 opacity-75 hover:bg-[#9aaaa1] rounded-lg" src="assets/img/forms/eye.png"
                      alt="show_password" /></span>
                </div>
                <input
                    v-model="state.user.password"
                    :type="inputType"
                    id="passwordGuest"
                    class="w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-2 mt-1"
                    name="password_guest" placeholder="*" />
      
                <div class="flex justify-center items-center mb-3 text-center">
                  <button type="submit" name="go-to-home-page"
                    class="w-full mt-3 py-2 px-10 shadow-md tracking-wider rounded-lg hover:bg-[#febd5b] bg-[#5c6f9f] font-semibold text-white border-[#2e5679] hover:text-[#445277] transition duration-300 ease-in-out">
                    Enter
                  </button>
                </div>
              </section>
      
              <section class="text-end justify-between lg:mt-5 mt-0 lg:flex lg:flex-row flex flex-col-reverse">
                <div class="flex justify-center">
                  <p class="text-gray-800 text-base">Don't have an account?</p>
                  <div>
                    <nuxt-link to="/register">
                      <button class="ml-1 font-medium text-blue-800 hover:opacity-60">
                        Sign Up
                      </button>
                    </nuxt-link>
                  </div>
                </div>
                <div>
                  <button name="go-to-forgot-password" class="text-blue-800 text-sm hover:opacity-60 mb-3">
                    Forgot password?
                  </button>
                </div>
              </section>
      
              <section class="flex justify-center mt-5 mb-3 cursor-default">
                <hr class="w-full m-auto border mr-2" />
                <p class="m-auto text-gray-800 text-sm font-bold">OR</p>
                <hr class="w-full m-auto border ml-2" />
              </section>
      
              <p class="text-center mb-5 text-gray-800">Sign in using:</p>
      
              <section class="mb-5">
                <button
                  class="w-full mt-3 py-2 px-10 shadow-md tracking-wider rounded-lg bg-[#4eb876] font-semibold text-white transition duration-300 ease-in-out hover:opacity-75 flex">
                  <div class="flex justify-center items-center m-auto">
                    <img class="w-auto h-6 mr-2" src="assets/img/socials/google.png" alt="google" />
                    <p class="m-auto mr-1 lg:block hidden">Login with</p>
                    <p class="m-auto">Google</p>
                  </div>
                </button>
                <button
                  class="w-full mt-3 py-2 px-10 shadow-md tracking-wider rounded-lg bg-[#0041de] font-semibold text-white transition duration-300 ease-in-out hover:opacity-75 flex">
                  <div class="flex justify-center items-center m-auto">
                    <img class="w-auto h-6 mr-2" src="assets/img/socials/facebook.png" alt="fb" />
                    <p class="m-auto mr-1 lg:block hidden">Login with</p>
                    <p class="m-auto">Facebook</p>
                  </div>
                </button>
              </section>
            </section>
        </form>
  
        <!-- Admin Login Form (hidden by default) -->
        <section id="adminLogin" v-if="activeForm === 'adminLogin'">
          <section class="w-[350px] lg:w-[500px] mx-auto duration-300">
            <div class="lg:flex block duration-300">
              <label class="mr-2 text-gray-800">Username:</label>
            </div>
            <input
              class="w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-1"
              type="text" name="username_admin" placeholder="*" />
            <div class="flex justify-between">
              <div class="lg:flex block duration-300">
                <label class="mr-2 text-gray-800">Password:</label>
              </div>
              <span @mouseover="showPassword" @mouseout="hidePassword">
                <img class="w-auto h-5 opacity-75 hover:bg-[#9aaaa1] rounded-lg" src="assets/img/forms/eye.png"
                  alt="show" />
              </span>
            </div>
            <input :type="inputType" id="passwordAdmin"
              class="w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-2 mt-1"
              name="password_admin" placeholder="*" />
  
            <div class="flex justify-center items-center mb-3 text-center">
              <button type="submit"
                class="w-full mt-3 py-2 px-10 shadow-md tracking-wider rounded-lg hover:bg-[#febd5b] bg-[#5c6f9f] font-semibold text-white border-[#2e5679] hover:text-[#445277] transition duration-300 ease-in-out">
                Enter
              </button>
            </div>
          </section>
  
          <section class="text-end">
            <button name="go-to-forgot-password" class="text-blue-800 text-sm hover:opacity-60 mb-3">
              Forgot password?
            </button>
          </section>
        </section>
      </div>
    </div>
  </template>
  
  <script setup>
  import "./assets/scroll-bar.css";

  const state = reactive({
  errors: [],
  user: {
    username: null,
    password: null
  }
});

async function Login(){
  const params = {
    username: state.user.username,
    password: state.user.password
  }
  try{
    const response = await $fetch(`http://127.0.0.1:8000/api/login`, {
    method: 'POST',
    body: params
  })

  if(response.data){
    localStorage.setItem('_token', response.data.token)
    navigateTo('/guest'); 
  }

  }
  catch(error){
    state.errors = error.response
    console.log(error.response)
    console.log('error', error)
  }
}
  
  // Define data properties
  const activeForm = ref('guestLogin');
  const inputType = ref('password');
  
  // Function to switch between login forms
  const switchToLoginForm = (formType) => {
    activeForm.value = formType;
  };
  
  // Function to show/hide password
  const showPassword = () => {
    inputType.value = 'text';
  };
  
  const hidePassword = () => {
    inputType.value = 'password';
  };
  
  </script>