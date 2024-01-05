<template >
  <div v-if="isOpen" class="fixed inset-0 flex items-center justify-center z-60 text-start">
    <div class="bg-black opacity-50 fixed inset-0"></div>
    <div class="bg-[#d0d9e7] rounded-lg relative z-20 p-6 overflow-y-scroll block max-h-[85%]">
      <button @click="closeModal"
        class="cursor-pointer text-xl font-bold absolute top-2 right-2 text-gray-500 px-2 rounded-md hover:bg-red-400 hover:text-white">
        &times;
      </button>

      <form @submit.prevent="registerAcc" @keydown.enter.prevent class="w-[400px] lg:w-[700px] duration-300">
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
                  type="text" v-model="new_acc.reg_fname" placeholder="*">
                <h4 class="text-sm text-gray-400">First Name</h4>
              </div>
              <div>
                <input
                  class="lg:w-[288px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94]"
                  type="text" v-model="new_acc.reg_lname" placeholder="*">
                <h4 class="text-sm text-gray-400">Last Name</h4>
              </div>
              <div class="">
                <input
                  class="lg:w-[100px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94]"
                  v-model="new_acc.reg_midini" type="text">
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
                type="text" v-model="new_acc.reg_bdate" placeholder="MM-dd-YYYY">
            </section>

            <section>
              <div class="lg:flex block duration-300">
                <label class="text-gray-800">Gender:</label>
              </div>
              <div class="lg:flex block lg:gap-5 gap-5 lg:justify-between justify-normal mt-1">
                <div class="flex lg:gap-5 gap-10 mb-2 m-auto">
                  <div class="flex justify-center">
                    <input id="male-radio" class="mr-2" type="radio" v-model="new_acc.reg_gender" name="gender_choice"
                      value="male" @change="toggleTextInput">
                    <label for="male-radio" class="text-gray-600">Male</label>
                  </div>
                  <div class="flex justify-center">
                    <input id="female-radio" class="mr-2" type="radio" v-model="new_acc.reg_gender" name="gender_choice"
                      value="female" @change="toggleTextInput">
                    <label for="female-radio" class="text-gray-600 m-auto">Female</label>
                  </div>
                </div>
                <div class="flex justify-center">
                  <input id="others-radio" class="mr-2 mt-1" type="radio" v-model="new_acc.reg_gender"
                    name="gender_choice" value="others" @change="toggleTextInput">
                  <label for="others-radio" class="text-gray-600 mr-2 m-auto">Others:</label>
                  <input id="others-text-input" ref="othersTextInput"
                    class="w-full bg-[#cbd0d9] py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94]"
                    type="text" name="other_gender" v-model="new_acc.other_gender_text" placeholder="Please specify"
                    disabled>

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
                type="text" v-model="new_acc.reg_contact">
            </div>
            <div>
              <div class="lg:flex block duration-300">
                <label class="text-gray-800">Address:</label>
              </div>
              <input
                class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                type="text" v-model="new_acc.reg_address" placeholder="*">
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
                type="text" v-model="new_acc.reg_username" placeholder="*">
            </div>
            <div>
              <div class="lg:flex block duration-300">
                <label class="text-gray-800">Email:</label>
              </div>
              <input
                class="lg:w-[340px] w-full bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:border-[#003568] focus:text-[#004e94] mt-1"
                type="email" v-model="new_acc.reg_email" placeholder="*">
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
                v-model="new_acc.reg_pass" placeholder="*">
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
                v-model="new_acc.reg_cpass" placeholder="*">
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
      new_acc: {
        reg_fname: '',
        reg_lname: '',
        reg_midini: '',
        reg_bdate: '',
        reg_gender: '',
        other_gender_text: '',
        reg_username: '',
        reg_email: '',
        reg_pass: '',
        reg_cpass: '',
        reg_contact: '',
        reg_address: '',
      },
      isPasswordVisible: false,
      passwordInputType: 'password',
      confirmPasswordInputType: 'password'
    };
  },

  methods: {
    closeModal() {
      this.new_acc.reg_fname = '';
      this.new_acc.reg_lname = '';
      this.new_acc.reg_midini = '';
      this.new_acc.reg_bdate = '';
      this.new_acc.reg_gender = '';
      this.new_acc.other_gender_text = '';
      this.new_acc.reg_username = '';
      this.new_acc.reg_email = '';
      this.new_acc.reg_pass = '';
      this.new_acc.reg_cpass = '';
      this.new_acc.reg_contact = '';
      this.new_acc.reg_address = '';
      this.$emit('close');
    },
    registerAcc() {
      // Handle form submission logic here
      // For example, send a request to register the user
      // You can use this.firstName, this.lastName, etc. to access form data
      alert("Registered!");
      this.closeModal();
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
      const selectedGender = this.new_acc.reg_gender;
      if (selectedGender === 'others') {
        this.$refs.othersTextInput.disabled = false;
        this.$refs.othersTextInput.style.backgroundColor = 'white'; // Set background color to white
      } else {
        this.$refs.othersTextInput.disabled = true;
        this.$refs.othersTextInput.style.backgroundColor = '#cbd0d9'; // Set default background color
        this.new_acc.other_gender_text = '';
      }
    }
  }
};
</script>