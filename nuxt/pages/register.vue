<template>
    <div class="fixed inset-0 flex items-center justify-center z-60 text-start">
      <div class="bg-black opacity-40 fixed inset-0"></div>
      <div class="bg-[#d0d9e7] rounded-lg relative z-20 p-6 overflow-y-scroll block max-h-[85%]">
        <nuxt-link to="/login">
          <button @click="closeRegister"
            class="cursor-pointer text-xl font-bold absolute top-2 right-2 text-gray-500 px-2 rounded-md hover:bg-red-400 hover:text-white">
            &times;
          </button>
        </nuxt-link>
  
        <form @submit.prevent="Register" class="w-[400px] lg:w-[700px] duration-300">
          <section class="mt-6 mb-5 cursor-default font-semibold text-gray-800 text-lg flex items-center">
            <img class="w-auto h-6 mr-1" src="assets/img/forms/add-user.png" alt="add-user">
            <h1 class="font-bold">Create an Account</h1>
          </section>
  
          <div v-if="isLoading" class="mt-5">
            <!-- Assuming Loading is a component -->
            <Loading :title="isLoadingTitle" />
          </div>
  
          <div v-else>
            <section class="flex mb-2 mt-8 cursor-default">
              <p class="text-gray-800 text-base px-2 font-semibold py-1 w-full tracking-wider bg-[#b5bcc9]">
                Personal Information
              </p>
            </section>
  
            <section class="">
              <section class="mb-3">
                <div class="lg:flex block duration-300">
                  <label class="mr-2 text-gray-800">Full Name:</label>
                </div>
                <section class="flex lg:gap-0 gap-2 justify-between mt-1">
                  <div class="lg:w-[288px]">
                    <h4 class="text-sm text-gray-400">First Name</h4>
                    <input
                      class="w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94]"
                      type="text" v-model="state.user.first_name" placeholder="*" />
                    <span class="text-red-500 text-sm font-semibold tracking-wide">{{ state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.first_name && state.errors._data.errors.first_name[0]}}</span>
                  </div>
                  <div class="lg:w-[288px]">
                    <h4 class="text-sm text-gray-400">Last Name</h4>
                    <input
                      class="w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94]"
                      type="text" v-model="state.user.last_name" placeholder="*" />
                    <span class="text-red-500 text-sm font-semibold tracking-wide">{{ state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.last_name && state.errors._data.errors.last_name[0]}}</span>
                  </div>
                  <div class="">
                    <h4 class="text-sm text-gray-400">M. I. (Opt.)</h4>
                    <input 
                      class="lg:w-[100px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94]"
                      v-model="state.user.middle_initial" type="text" />
                    <span class="text-red-500 text-sm font-semibold tracking-wide">{{ state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.middle_initial && state.errors._data.errors.middle_initial[0]}}</span>
                  </div>
                </section>
              </section>
  
              <section class="mb-3 flex lg:gap-0 gap-3 justify-between">
                <div>
                  <div class="flex duration-300">
                    <label class="text-gray-800">Date of Birth:</label>
                    <p class="text-sm text-gray-400 ml-1">(yyyy-mm-dd)</p>
                  </div>
                  <input
                    class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                    type="text" v-model="state.user.birth_date" placeholder="*" />
                  <span class="text-red-500 text-sm font-semibold tracking-wide">{{ state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.birth_date && state.errors._data.errors.birth_date[0]}}</span>
                </div>
                <div class="lg:w-full w-auto">
                  <div class="lg:flex block duration-300">
                    <label class="text-gray-800 ml-1">Gender:</label>
                  </div>
                  <div class="px-2 py-2 flex mt-2 justify-between">
                    <div class="flex w-full lg:w-1/2 lg:mr-0 mr-10">
                      <input id="male-radio" class="mr-2" type="radio" v-model="state.user.gender" name="gender_choice"
                        value="male" />
                      <label for="male-radio" class="text-gray-600">Male</label>
                    </div>
                    <div class="flex w-full">
                      <input id="female-radio" class="mr-2" type="radio" v-model="state.user.gender" name="gender_choice"
                        value="female" />
                      <label for="female-radio" class="text-gray-600">Female</label>
                    </div>
                  </div>
                  <span class="text-red-500 text-sm font-semibold tracking-wide">{{ state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.gender && state.errors._data.errors.gender[0]}}</span>
                </div>
              </section>
  
              <section class="mb-3 flex lg:gap-0 gap-3 justify-between">
                <div>
                  <div class="flex duration-300">
                    <label class="text-gray-800">Phone No:</label>
                    <img class="ml-1 w-auto h-4 m-auto" src="/assets/img/forms/ph-flag.png" alt="ph">
                  </div>
                  <input
                    class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                    type="text" v-model="state.user.phone" />
                  <span class="text-red-500 text-sm font-semibold tracking-wide">{{ state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.phone && state.errors._data.errors.phone[0]}}</span>
                </div>
                <div>
                  <div class="lg:flex block duration-300">
                    <label class="text-gray-800">Address:</label>
                  </div>
                  <input
                    class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                    type="text" v-model="state.user.address" />
                  <span class="text-red-500 text-sm font-semibold tracking-wide">{{ state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.address && state.errors._data.errors.address[0]}}</span>
                </div>
              </section>
            </section>
  
            <section class="mb-3">
              <!-- ... Personal Information Section ... -->
            </section>
  
            <section class="flex mb-2 mt-10 cursor-default">
              <p class="text-gray-800 text-base px-2 font-semibold py-1 w-full tracking-wider bg-[#b5bcc9]">
                Login Credentials <span class="font-normal text-sm">(to access our website)</span>
              </p>
            </section>
  
            <section class="">
              <section class="mb-3 flex lg:gap-0 gap-3 justify-between">
                <div>
                  <div class="lg:flex block duration-300">
                    <label class="text-gray-800">Username:</label>
                  </div>
                  <input
                    class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                    type="text" v-model="state.user.username" placeholder="*" />
                  <span class="text-red-500 text-sm font-semibold tracking-wide">{{ state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.username && state.errors._data.errors.username[0]}}</span>
                </div>
                <div>
                  <div class="lg:flex block duration-300">
                    <label class="text-gray-800">Email:</label>
                  </div>
                  <input
                    class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                    v-model="state.user.email" placeholder="*" />
                  <span class="text-red-500 text-sm font-semibold tracking-wide">{{ state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.email && state.errors._data.errors.email[0]}}</span>
                </div>
              </section>
  
              <section class="mb-3 flex lg:gap-0 gap-3 justify-between">
                <!-- Password Input -->
                <div>
                  <div class="lg:flex block duration-300">
                    <label class="text-gray-800">Password:</label>
                  </div>
                  <input :type="passwordInputType"
                    class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                    v-model="state.user.password" placeholder="*" />
                  <span class="text-red-500 text-sm font-semibold tracking-wide">{{ state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.password && state.errors._data.errors.password[0]}}</span>
                </div>
  
                <!-- Confirm Password Input -->
                <div>
                  <div class="flex justify-between">
                    <div class="lg:flex block duration-300">
                      <label class="text-gray-800">Confirm
                        Password:</label>
                    </div>
                    <span class="w-auto h-5 opacity-75 hover:bg-[#9aaaa1] rounded-lg" @mouseover="showPassword"
                      @mouseout="hidePassword">
                      <img class="w-auto h-5 opacity-75 rounded-lg" src="assets/img/forms/eye.png" alt="show">
                    </span>
                  </div>
                  <input
                    :type="confirmPasswordInputType"
                    class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                    v-model="state.user.password_confirmation" placeholder="*" />
                  <span class="text-red-500 text-sm font-semibold tracking-wide"></span>
                </div>
              </section>
  
            </section>
  
            <section class="mt-3 flex mb-2">
              <input type="checkbox" id="termsCheckbox" class="form-checkbox text-[#5c6f9f]">
              <label for="termsCheckbox" class="text-gray-800 ml-2 mr-1">
                I have carefully reviewed and accepted the terms of
                <nuxt-link to="/terms">
                  <button class="text-blue-800 font-semibold underline hover:opacity-60">PsycheAssist.</button>
                </nuxt-link>
              </label>
            </section>
  
            <section class="flex justify-center items-center">
              <button type="submit" name="register"
                class="w-full mt-3 py-2 px-10 shadow-md tracking-wider rounded-lg hover:bg-[#febd5b] bg-[#5c6f9f] font-semibold text-white border-[#2e5679] hover:text-[#445277] transition duration-300 ease-in-out">Register</button>
            </section>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';

  const state = reactive({
  errors: [],
  user:{
    first_name: null,
    last_name: null,
    middle_initial: null,
    birth_date: null,
    gender: null,
    phone: null,
    address: null,
    username:null,
    email: null,
    password: null,
    password_confirmation: null
  }
})
async function Register(){

  const params = {
      first_name: state.user.first_name,
      last_name: state.user.last_name,
      middle_initial: state.user.middle_initial,
      birth_date: state.user.birth_date,
      gender: state.user.gender,
      phone: state.user.phone,
      address: state.user.address,
      username: state.user.username,
      email: state.user.email,
      password: state.user.password,
      password_confirmation: state.user.password_confirmation
  }
  try{
    const response = await $fetch(`http://127.0.0.1:8000/api/register`, {
    method: 'POST',
    body: params
  })

  if(response.data){
    navigateTo('/guest');
  }
  }
  catch(error){
    state.errors = error.response
    console.log(error.response)
    console.log('error', error)
  }
}
  
  const isLoading = ref(false);
  const isLoadingTitle = ref('Loading');
  const passwordInputType = ref('password');
  const confirmPasswordInputType = ref('password');
  
  const showPassword = () => {
    passwordInputType.value = 'text';
    confirmPasswordInputType.value = 'text';
  };
  
  const hidePassword = () => {
    passwordInputType.value = 'password';
    confirmPasswordInputType.value = 'password';
  };
  
  </script>