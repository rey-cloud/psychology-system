<template >
  <div v-if="isOpen" class="fixed inset-0 flex items-center justify-center z-60 text-start">
    <div class="bg-black opacity-50 fixed inset-0"></div>
    <div class="bg-[#d0d9e7] rounded-lg relative z-20 p-6 overflow-y-scroll block max-h-[85%]">
      <button @click="closeModal"
        class="cursor-pointer text-xl font-bold absolute top-2 right-2 text-gray-500 px-2 rounded-md hover:bg-red-400 hover:text-white">
        &times;
      </button>

      <form @submit.prevent="registerAcc()" class="w-[400px] lg:w-[700px] duration-300">
        <section class="mt-6 mb-5 cursor-default font-semibold text-gray-800 text-lg flex items-center">
          <img class="w-auto h-6 mr-1" src="assets/img/add-user.png" alt="add-user">
          <h1 class="font-bold">Create an Account</h1>
        </section>

        <div v-if="isLoading" class="mt-5">
          <Loading :title="isLoadingTitle" />
        </div>

        <div v-else>
          <section class="flex mb-2 mt-8 cursor-default">
            <p class="text-gray-800 text-base px-2 font-semibold py-1 w-full tracking-wider bg-[#b5bcc9]">
              Personal Information
            </p>
          </section>

          <section class="px-2">
            <section class="mb-3">
              <div class="lg:flex block duration-300">
                <label class="mr-2 text-gray-800">Full Name:</label>
              </div>
              <section class="flex lg:gap-0 gap-2 justify-between mt-1">
                <div>
                  <h4 class="text-sm text-gray-400">First Name</h4>
                  <input
                    class="lg:w-[288px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94]"
                    type="text" v-model="reg_acc.first_name" placeholder="*" />
                  <span class="text-sm text-red-500 font-semibold tracking-wide" v-if="this.errorList.first_name">{{
                    this.errorList.first_name[0], this.errorList.first_name[1], this.errorList.first_name[2]
                  }}</span>
                </div>
                <div>
                  <h4 class="text-sm text-gray-400">Last Name</h4>
                  <input
                    class="lg:w-[288px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94]"
                    type="text" v-model="reg_acc.last_name" placeholder="*" />
                  <span class="text-sm text-red-500 font-semibold tracking-wide" v-if="this.errorList.last_name">{{
                    this.errorList.last_name[0], this.errorList.last_name[1], this.errorList.last_name[2]
                  }}</span>
                </div>
                <div class="">
                  <h4 class="text-sm text-gray-400">M. I. (Opt.)</h4>
                  <input
                    class="lg:w-[100px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94]"
                    v-model="reg_acc.middle_initial" type="text" />
                  <span class="text-sm text-red-500 font-semibold tracking-wide" v-if="this.errorList.middle_initial">{{
                    this.errorList.middle_initial[0], this.errorList.middle_initial[1], this.errorList.middle_initial[2]
                  }}</span>
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
                  type="text" v-model="reg_acc.birth_date" placeholder="*" />
                <span class="text-sm text-red-500 font-semibold tracking-wide" v-if="this.errorList.birth_date">{{
                  this.errorList.birth_date[0], this.errorList.birth_date[1]
                }}</span>
              </div>
              <div class="lg:w-full w-auto">
                <div class="lg:flex block duration-300">
                  <label class="text-gray-800 ml-1">Gender:</label>
                </div>
                <div class="px-2 py-2 flex mt-2 justify-between">
                  <div class="flex w-full lg:w-1/2 lg:mr-0 mr-10">
                    <input id="male-radio" class="mr-2" type="radio" v-model="reg_acc.gender" name="gender_choice"
                      value="male" />
                    <label for="male-radio" class="text-gray-600">Male</label>
                  </div>
                  <div class="flex w-full">
                    <input id="female-radio" class="mr-2" type="radio" v-model="reg_acc.gender" name="gender_choice"
                      value="female" />
                    <label for="female-radio" class="text-gray-600">Female</label>
                  </div>
                </div>
                <span class="text-sm text-red-500 font-semibold tracking-wide ml-2" v-if="this.errorList.gender">{{
                  this.errorList.gender[0]
                }}</span>
              </div>
            </section>

            <section class="mb-3 flex lg:gap-0 gap-3 justify-between">
              <div>
                <div class="lg:flex block duration-300">
                  <div class="flex justify-center">
                    <label class="text-gray-800">Phone No:</label>
                    <img class="ml-1 w-auto h-4 m-auto" src="/assets/img/ph-flag.png" alt="ph">
                  </div>
                </div>
                <input
                  class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                  type="text" v-model="reg_acc.phone" />
                <span class="text-sm text-red-500 font-semibold tracking-wide" v-if="this.errorList.phone">{{
                  this.errorList.phone[0], this.errorList.phone[1]
                }}</span>
              </div>
              <div>
                <div class="lg:flex block duration-300">
                  <label class="text-gray-800">Address:</label>
                </div>
                <input
                  class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                  type="text" v-model="reg_acc.address" />
                <span class="text-sm text-red-500 font-semibold tracking-wide" v-if="this.errorList.address">{{
                  this.errorList.address[0], this.errorList.address[1], this.errorList.address[2]
                }}</span>
              </div>
            </section>

          </section>

          <section class="flex mb-2 mt-10 cursor-default">
            <p class="text-gray-800 text-base px-2 font-semibold py-1 w-full tracking-wider bg-[#b5bcc9]">
              Login Credentials <span class="font-normal text-sm">(to access our website)</span>
            </p>
          </section>

          <section class="px-2">
            <section class="mb-3 flex lg:gap-0 gap-3 justify-between">
              <div>
                <div class="lg:flex block duration-300">
                  <label class="text-gray-800">Username:</label>
                </div>
                <input
                  class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                  type="text" v-model="reg_acc.username" placeholder="*" />
                <span class="text-sm text-red-500 font-semibold tracking-wide" v-if="this.errorList.username">{{
                  this.errorList.username[0], this.errorList.username[1], this.errorList.username[2],
                  this.errorList.username[3]
                }}</span>
              </div>
              <div>
                <div class="lg:flex block duration-300">
                  <label class="text-gray-800">Email:</label>
                </div>
                <input
                  class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                  type="email" v-model="reg_acc.email" placeholder="*" />
                <span class="text-sm text-red-500 font-semibold tracking-wide" v-if="this.errorList.email">{{
                  this.errorList.email[0], this.errorList.email[1]
                }}</span>
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
                  v-model="reg_acc.password" placeholder="*" />
                <span class="text-sm text-red-500 font-semibold tracking-wide" v-if="this.errorList.password">{{
                  this.errorList.password[0], this.errorList.password[1], this.errorList.password[2],
                  this.errorList.password[3]
                }}</span>
              </div>

              <!-- Confirm Password Input -->
              <div>
                <div class="flex justify-between">
                  <div class="lg:flex block duration-300">
                    <label class="text-gray-800">Confirm Password:</label>
                  </div>
                  <span class="w-auto h-5 opacity-75 hover:bg-[#9aaaa1] rounded-lg" @mouseover="showPassword"
                    @mouseout="hidePassword">
                    <img class="w-auto h-5 opacity-75 rounded-lg" src="assets/img/eye.png" alt="show">
                  </span>
                </div>
                <input :type="confirmPasswordInputType"
                  class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                  v-model="reg_acc.confirm_password" placeholder="*" />
                <span class="text-sm text-red-500 font-semibold tracking-wide" v-if="this.errorList.confirm_password">{{
                  this.errorList.confirm_password[0], this.errorList.confirm_password[1],
                  this.errorList.confirm_password[2]
                }}</span>
              </div>
            </section>
          </section>

          <section class="mt-3 flex mb-2">
            <input type="checkbox" id="termsCheckbox" class="form-checkbox text-[#5c6f9f]">
            <label for="termsCheckbox" class="text-gray-800 ml-2 mr-1">
              I have carefully reviewed and accepted the terms of
              <button name="go-to-terms"
                class="text-blue-800 font-semibold underline hover:opacity-60">PsycheAssist.</button>
            </label>
          </section>

          <section class="flex justify-center items-center">
            <button type="submit" name="register"
              class="w-full mt-3 py-2 px-10 shadow-md tracking-wider rounded-lg hover:bg-[#febd5b] bg-[#5c6f9f] font-semibold text-white border-[#2e5679] hover:text-[#002951] transition duration-300 ease-in-out">Register</button>
          </section>
        </div>

      </form>

    </div>
  </div>
</template>


<script>
import axios from 'axios';

export default {
  name: "RegisterAcc",

  props: {
    isOpen: {
      type: Boolean,
      required: true
    }
  },

  data() {
    return {
      reg_acc: {
        first_name: '',
        last_name: '',
        middle_initial: '',
        birth_date: '',
        gender: '',
        username: '',
        email: '',
        password: '',
        confirm_password: '',
        phone: '',
        address: '',
      },
      isLoading: false,
      isLoadingTitle: "Loading",
      isPasswordVisible: false,
      passwordInputType: 'password',
      confirmPasswordInputType: 'password',
      errorList: {}
    };
  },

  methods: {
    registerAcc() {
      this.isLoading = true;
      this.isLoadingTitle = "Saving";

      var myThis = this;

      axios.post(`http://127.0.0.1:8000/api/users`, this.reg_acc).then(res => {
        console.log(res, 'res');
        alert(res.data.message);

        this.reg_acc.first_name = '';
        this.reg_acc.last_name = '';
        this.reg_acc.middle_initial = '';
        this.reg_acc.birth_date = '';
        this.reg_acc.gender = '';
        this.reg_acc.username = '';
        this.reg_acc.email = '';
        this.reg_acc.password = '';
        this.reg_acc.confirm_password = '';
        this.reg_acc.phone = '';
        this.reg_acc.address = '';
        this.errorList = '';

        this.isLoading = false;
        this.isLoadingTitle = "Loading";
      })
        .catch(function (error) {
          console.log(error, 'errors');

          if (error.response) {
            if (error.response.status == 422) {
              myThis.errorList = error.response.data.errors;
            }
          }
          myThis.isLoading = false;
        });
    },
    closeModal() {
      this.reg_acc.first_name = '';
      this.reg_acc.last_name = '';
      this.reg_acc.middle_initial = '';
      this.reg_acc.birth_date = '';
      this.reg_acc.gender = '';
      this.reg_acc.username = '';
      this.reg_acc.email = '';
      this.reg_acc.password = '';
      this.reg_acc.confirm_password = '';
      this.reg_acc.phone = '';
      this.reg_acc.address = '';
      this.errorList = '';
      this.$emit('close');

    },
    showPassword() {
      this.passwordInputType = 'text';
      this.confirmPasswordInputType = 'text';
    },
    hidePassword() {
      this.passwordInputType = 'password';
      this.confirmPasswordInputType = 'password';
    },
  }
};
</script>