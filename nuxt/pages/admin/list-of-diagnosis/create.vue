<template>
    <div class="container mx-auto p-4">
      <div class="max-w-md mx-auto bg-white p-8 border rounded shadow">
        <div class="mb-5 flex justify-between">
          <nuxt-link to="/admin/list-of-diagnosis"><button
              class="border-2 rounded-md px-3 py-1 bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors text-white">
              &lt; Back</button></nuxt-link>
          <h4 class="text-2xl font-bold">New Diagnosis</h4>
        </div>
  
        <form @submit.prevent="saveDiagnosis">
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Diagnosis:</label>
            <span v-if="this.errorList.diagnosis" class="text-red-500">{{ this.errorList.diagnosis[0] }}</span>
            <input type="text" v-model="diagnosis.diagnosis" class="mt-1 p-2 border rounded w-full" />
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Recommendation</label>
            <span v-if="this.errorList.recommendation" class="text-red-500">{{ this.errorList.recommendation[0] }}</span>
            <input type="text" v-model="diagnosis.recommendation" class="mt-1 p-2 border rounded w-full" />
          </div>

          <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
          </div>
        </form>
      </div>
    </div>
  </template>
    
  <script>
  import axios from 'axios';
  
  export default {
    name: "DiagnosisCreate",
    data() {
      return {
        diagnosis: {
          diagnosis: "",
          recommendation: "",
        },
        errorList: {}
      };
    },
    methods: {
      saveDiagnosis() {
        //alert("am here");
        console.log('Data to be sent:', this.diagnosis);
  
        var myThis = this;
  
        axios.post(`http://127.0.0.1:8000/api/diagnosis`, this.diagnosis).then(res => {
          console.log(res, 'res');
          alert(res.data.message);
  
          this.errorList = {};

          this.diagnosis.diagnosis = '';
          this.diagnosis.recommendation = '';
  
        })
          .catch(function (error) {
            console.log(error, 'errors')
  
            if (error.response) {
              if (error.response.status == 422) {
                myThis.errorList = error.response.data.errors;
              }
            }
          });
      }
    }
  };
  </script>
  
    