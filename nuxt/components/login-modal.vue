<template>
  <div v-if="isOpen" class="modal-container">
    <div
      class="fixed top-0 left-0 w-full h-full bg-black opacity-75 z-10"
    ></div>
    <div
      class="modal fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-[#d0d9e7] p-6 shadow-lg rounded-lg z-20"
      style="display: block; max-height: 85%; overflow-y: scroll"
    >
      <button
        @click="closeModal"
        class="cursor-pointer text-xl font-bold absolute top-2 right-2 text-gray-500 px-2 rounded-md hover:bg-red-400 hover:text-white"
      >
        &times;
      </button>

      <!-- Switch button -->
      <section
        class="mt-6 mb-3 cursor-default font-semibold text-gray-800 text-lg flex justify-between"
      >
        <div class="flex items-center">
          <img class="w-auto h-6 mr-1" src="assets/img/login.png" alt="login" />
          <h1 class="py-2 text-start font-bold">Login</h1>
        </div>
        <div class="flex justify-center">
          <button
            @click="switchToLoginForm('guestLogin')"
            :class="{
              'cursor-pointer bg-[#5c6f9f] text-white px-4 py-2 rounded-s-lg border-s-2 border-y-2 tracking-wider':
                activeForm === 'guestLogin',
              'cursor-pointer px-4 py-2 rounded-s-lg border-s-2 border-y-2 tracking-wider text-gray-800':
                activeForm !== 'guestLogin',
            }"
          >
            Guest
          </button>
          <button
            @click="switchToLoginForm('adminLogin')"
            :class="{
              'cursor-pointer bg-[#5c6f9f] text-white px-4 py-2 rounded-e-lg border-e-2 border-y-2  tracking-wider':
                activeForm === 'adminLogin',
              'cursor-pointer px-4 py-2 rounded-e-lg border-e-2 border-y-2 tracking-wider text-gray-800':
                activeForm !== 'adminLogin',
            }"
          >
            Admin
          </button>
        </div>
      </section>

      <!-- Guest Login Form -->
      <section id="guestLogin" v-if="activeForm === 'guestLogin'">
        <section class="w-[350px] lg:w-[500px] mx-auto duration-300">
          <div class="lg:flex block duration-300">
            <label class="mr-2 text-gray-800">Username:</label>
          </div>
          <input
            class="w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3"
            type="text"
            name="username_guest"
            placeholder="*"
          />
          <div class="flex justify-between">
            <div class="lg:flex block duration-300">
              <label class="mr-2 text-gray-800">Password:</label>
            </div>
            <span @click="togglePassword">
              <img
                class="w-auto h-5 opacity-75 hover:bg-[#9aaaa1] rounded-lg"
                src="assets/img/eye.png"
                alt="show_password"
            /></span>
          </div>
          <input
            :type="inputType"
            id="passwordGuest"
            class="w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-2 mt-3"
            name="password_guest"
            placeholder="*"
          />

          <div class="flex justify-center items-center mb-3 text-center">
            <button
              type="submit"
              name="go-to-home-page"
              class="w-full mt-3 py-2 px-10 shadow-md tracking-wider rounded-lg hover:bg-[#febd5b] bg-[#5c6f9f] font-semibold text-white border-[#2e5679] hover:text-[#002951] transition duration-300 ease-in-out"
            >
              Enter
            </button>
          </div>
        </section>

        <section
          class="text-end justify-between lg:mt-5 mt-0 lg:flex lg:flex-row flex flex-col-reverse"
        >
          <div class="flex justify-center">
            <p class="text-gray-800 text-base">Don't have an account?</p>
            <div>
              <button
                name="go-to-sign-up"
                class="ml-1 font-medium text-blue-800 hover:opacity-60"
              >
                Sign Up
              </button>
            </div>
          </div>
          <div>
            <button
              name="go-to-forgot-password"
              class="text-blue-800 text-sm hover:opacity-60 mb-3"
            >
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
            class="w-full mt-3 py-2 px-10 shadow-md tracking-wider rounded-lg bg-[#4eb876] font-semibold text-white transition duration-300 ease-in-out hover:opacity-75 flex"
          >
            <div class="flex justify-center items-center m-auto">
              <img
                class="w-auto h-6 mr-2"
                src="assets/img/google.png"
                alt="google"
              />
              <p class="m-auto mr-1 lg:block hidden">Login with</p>
              <p class="m-auto">Google</p>
            </div>
          </button>
          <button
            class="w-full mt-3 py-2 px-10 shadow-md tracking-wider rounded-lg bg-[#0041de] font-semibold text-white transition duration-300 ease-in-out hover:opacity-75 flex"
          >
            <div class="flex justify-center items-center m-auto">
              <img
                class="w-auto h-6 mr-2"
                src="assets/img/facebook.png"
                alt="fb"
              />
              <p class="m-auto mr-1 lg:block hidden">Login with</p>
              <p class="m-auto">Facebook</p>
            </div>
          </button>
        </section>
      </section>

      <!-- Admin Login Form (hidden by default) -->
      <section id="adminLogin" v-if="activeForm === 'adminLogin'">
        <section class="w-[350px] lg:w-[500px] mx-auto duration-300">
          <div class="lg:flex block duration-300">
            <label class="mr-2 text-gray-800">Username:</label>
          </div>
          <input
            class="w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3"
            type="text"
            name="username_admin"
            placeholder="*"
          />
          <div class="flex justify-between">
            <div class="lg:flex block duration-300">
              <label class="mr-2 text-gray-800">Password:</label>
            </div>
            <span @click="togglePassword">
              <img
                class="w-auto h-5 opacity-75 hover:bg-[#9aaaa1] rounded-lg"
                src="assets/img/eye.png"
                alt="show"
              />
            </span>
          </div>
          <input
            :type="inputType"
            id="passwordAdmin"
            class="w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-2 mt-3"
            name="password_admin"
            placeholder="*"
          />

          <div class="flex justify-center items-center mb-3 text-center">
            <button
              type="submit"
              name="go-to-home-page"
              class="w-full mt-3 py-2 px-10 shadow-md tracking-wider rounded-lg hover:bg-[#febd5b] bg-[#5c6f9f] font-semibold text-white border-[#2e5679] hover:text-[#002951] transition duration-300 ease-in-out"
            >
              Enter
            </button>
          </div>
        </section>

        <section class="text-end">
          <button
            name="go-to-forgot-password"
            class="text-blue-800 text-sm hover:opacity-60 mb-3"
          >
            Forgot password?
          </button>
        </section>
      </section>

      <!-- <button @click="openNestedModal" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
        Open Nested Modal
      </button>
      <NestedModal :isOpen="isNestedModalOpen" @close="closeNestedModal" /> -->
    </div>
  </div>
</template>

<script>
//import NestedModal from './child-modal.vue';
import "./assets/scroll-bar.css";

export default {
  props: {
    isOpen: {
      type: Boolean,
      required: true,
    },
  },
  // components: {
  //   NestedModal
  // },
  data() {
    return {
      isModalOpen: true,
      activeForm: "guestLogin",
      inputType: "password",
    };
  },
  methods: {
    closeModal() {
      this.$emit("close");
    },
    switchToLoginForm(formId) {
      this.activeForm = formId;
    },
    togglePassword() {
      this.inputType = this.inputType === "password" ? "text" : "password";
    },
  },
};
</script>
