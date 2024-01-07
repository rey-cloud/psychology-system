<template >
  <div v-if="isOpen" class="fixed inset-0 flex items-center justify-center z-60 text-start">
    <div class="bg-black opacity-50 fixed inset-0"></div>
    <div class="bg-[#d0d9e7] rounded-lg relative z-20 p-6 overflow-y-scroll block max-h-[85%]">
      <button @click="closeModal"
        class="cursor-pointer text-xl font-bold absolute top-2 right-2 text-gray-500 px-2 rounded-md hover:bg-red-400 hover:text-white">
        &times;
      </button>

      <div v-if="isLoading">
        <Loading :title="isLoadingTitle" />
      </div>
      <form @submit.prevent="registerAcc()" @keydown.enter.prevent class="w-[400px] lg:w-[700px] duration-300">
        <section class="mt-6 mb-5 cursor-default font-semibold text-gray-800 text-lg flex items-center">
          <img class="w-auto h-6 mr-1" src="assets/img/add-user.png" alt="add-user">
          <h1 class="font-bold">Create an Account</h1>
        </section>

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
                <input
                  class="lg:w-[288px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94]"
                  type="text" v-model="reg_acc.first_name" placeholder="*" />
                <h4 class="text-sm text-gray-400">First Name</h4>
              </div>
              <div>
                <input
                  class="lg:w-[288px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94]"
                  type="text" v-model="reg_acc.last_name" placeholder="*" />
                <h4 class="text-sm text-gray-400">Last Name</h4>
              </div>
              <div class="">
                <input
                  class="lg:w-[100px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94]"
                  v-model="reg_acc.middle_initial" type="text" />
                <h4 class="text-sm text-gray-400">M. I. (Optional)</h4>
              </div>
            </section>
          </section>

          <section class="mb-3 flex lg:gap-10 gap-5">
            <section>
              <div class="lg:flex block duration-300">
                <label class="mr-2 text-gray-800">Date of Birth:</label>
              </div>
              <input
                class="w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                type="text" v-model="reg_acc.birth_date" placeholder="MM-dd-YYYY" />
            </section>

            <section>
              <div class="lg:flex block duration-300">
                <label class="text-gray-800">Gender:</label>
              </div>
              <div class="lg:flex block lg:gap-5 gap-5 lg:justify-between justify-normal mt-1">
                <div class="flex lg:gap-5 gap-10 mb-2 m-auto">
                  <div class="flex justify-center">
                    <input id="male-radio" class="mr-2" type="radio" v-model="reg_acc.gender" name="gender_choice"
                      value="male" @change="toggleTextInput" />
                    <label for="male-radio" class="text-gray-600">Male</label>
                  </div>
                  <div class="flex justify-center">
                    <input id="female-radio" class="mr-2" type="radio" v-model="reg_acc.gender" name="gender_choice"
                      value="female" @change="toggleTextInput" />
                    <label for="female-radio" class="text-gray-600 m-auto">Female</label>
                  </div>
                </div>
                <div class="flex justify-center">
                  <input id="others-radio" class="mr-2 mt-1" type="radio" v-model="reg_acc.gender"
                    name="gender_choice" value="others" @change="toggleTextInput" />
                  <label for="others-radio" class="text-gray-600 mr-2 m-auto">Others:</label>
                  <input id="others-text-input" ref="othersTextInput"
                    class="w-full bg-[#cbd0d9] py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94]"
                    type="text" name="other_gender" v-model="reg_acc.other_gender_text" placeholder="Please specify"
                    disabled />

                </div>
              </div>
            </section>
          </section>

          <section class="mb-3 flex lg:gap-0 gap-3 justify-between">
            <div>
              <div class="lg:flex block duration-300">
                <label class="text-gray-800">Contact No.:</label>
              </div>
              <input
                class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                type="text" v-model="reg_acc.phone" />
            </div>
            <div>
              <div class="lg:flex block duration-300">
                <label class="text-gray-800">Address:</label>
              </div>
              <input
                class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                type="text" v-model="reg_acc.address" placeholder="*" />
            </div>
          </section>

        </section>

        <section class="flex mb-2 mt-10 cursor-default">
          <p class="text-gray-800 text-base px-2 font-semibold py-1 w-full tracking-wider bg-[#b5bcc9]">
            Login Credentials
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
            </div>
            <div>
              <div class="lg:flex block duration-300">
                <label class="text-gray-800">Email:</label>
              </div>
              <input
                class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                type="email" v-model="reg_acc.email" placeholder="*" />
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
        other_gender_text: '',
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
      // Handle form submission logic here
      // For example, send a request to register the user
      // You can use this.firstName, this.lastName, etc. to access form data
      // alert("Registered!");

      this.isLoading = true;
      this.isLoadingTitle = "Saving";

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
        this.reg_acc.phone = '';
        this.reg_acc.address = '';

        this.isLoading = false;
        this.isLoadingTitle = "Loading";
      });
    },
    closeModal() {
      this.reg_acc.reg_fname = '';
      this.reg_acc.reg_lname = '';
      this.reg_acc.reg_midini = '';
      this.reg_acc.reg_bdate = '';
      this.reg_acc.reg_gender = '';
      this.reg_acc.other_gender_text = '';
      this.reg_acc.reg_username = '';
      this.reg_acc.reg_email = '';
      this.reg_acc.reg_pass = '';
      this.reg_acc.reg_cpass = '';
      this.reg_acc.reg_contact = '';
      this.reg_acc.reg_address = '';
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
    toggleTextInput() {
      const selectedGender = this.reg_acc.reg_gender;
      if (selectedGender === 'others') {
        this.$refs.othersTextInput.disabled = false;
        this.$refs.othersTextInput.style.backgroundColor = 'white'; // Set background color to white
      } else {
        this.$refs.othersTextInput.disabled = true;
        this.$refs.othersTextInput.style.backgroundColor = '#cbd0d9'; // Set default background color
        this.reg_acc.other_gender_text = '';
      }
    }
  }
};
</script>