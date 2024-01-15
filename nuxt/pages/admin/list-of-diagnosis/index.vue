<template>
  <div class="container mx-auto p-4 bg-[#e4e4e4] h-screen">
    <div class="bg-white p-8 border rounded shadow">
      <div class="mb-4 flex items-center justify-between">
        <nuxt-link to="/admin">
          <button
            class="border-2 rounded-md px-3 py-1 bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors text-white">
            &lt; Back</button></nuxt-link>
        <h4 class="text-2xl font-bold">Diagnosis Lists</h4>
        <nuxt-link to="/admin/list-of-diagnosis/create">
          <button
            class="border-2 rounded-md px-3 py-1 bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors text-white">&plus;
            New Diagnosis</button></nuxt-link>
      </div>
      <div>
        <table class="w-full border-collapse border border-gray-300">
          <thead class="bg-[#92999e]">
            <tr>
              <th class="p-2 border">ID</th>
              <th class="p-2 border">Diagnosis</th>
              <th class="p-2 border">Recommendation</th>
              <th class="p-2 border">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(diagnosis, index) in diagnosis" :key="index">
              <td class="p-2 border align-middle">D00{{ diagnosis.id }}</td>
              <td class="p-2 border align-middle">{{ diagnosis.diagnosis }}</td>
              <td class="p-2 border align-middle">{{ diagnosis.recommendation }}</td>
              <td class="p-2 border align-middle">
                <div class="flex justify-center gap-5">
                  <NuxtLink :to="`/admin/list-of-diagnosis/${diagnosis.id}`"
                    class="py-2 px-4 shadow-md tracking-wider rounded-2xl bg-[#B9E0A5] hover:opacity-75 font-semibold text-[#002951] transition duration-300 ease-in-out text-xs">
                    Edit</NuxtLink>
                  <button type="button" @click="$event => deleteDiagnosis($event, diagnosis.id)"
                    class="py-2 px-4 shadow-md tracking-wider rounded-2xl bg-[#FF9999] hover:opacity-75 font-semibold text-[#002951] transition duration-300 ease-in-out text-xs">Delete</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
  
<script>
import axios from 'axios';

export default {
  name: "DiagnosisList",
  data() {
    return {
      diagnosis: [],
    };
  },
  mounted() {
    this.getDiagnosis();
  },
  methods: {
    getDiagnosis() {
      axios.get(`http://127.0.0.1:8000/api/diagnosis`).then(res => {
        this.diagnosis = res.data.diagnosis;
      });
    },
    deleteDiagnosis(event, DiagnosisId) {
      if (confirm('Are you sure, you want to delete this Diagnosis?')) {
        event.target.innerText = 'Deleting';
        axios.delete(`http://127.0.0.1:8000/api/diagnosis/${DiagnosisId}/delete`).then(res => {
          event.target.innerText = 'Delete';
          this.getDiagnosis();
        });
      }
    }
  }
};
</script>
  