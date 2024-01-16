<template>
  <div class="container mx-auto p-4 bg-[#e4e4e4] h-screen">
    <div class="bg-white p-8 border rounded shadow">
      <div class="mb-4 flex items-center justify-between">
        <nuxt-link to="/admin">
          <button
            class="border-2 rounded-md px-3 py-1 bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors text-white">
            &lt; Back
          </button>
        </nuxt-link>
        <h4 class="text-2xl font-bold">Diagnosis Lists</h4>
        <nuxt-link to="/admin/list-of-diagnosis/create">
          <button
            class="border-2 rounded-md px-3 py-1 bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors text-white"
          >
            &plus; New Diagnosis
          </button>
        </nuxt-link>
      </div>
      <div>
        <table class="w-full border-collapse border border-gray-300">
          <thead class="bg-[#92999e]">
            <tr>
              <th class="p-2 border">ID</th>
              <th class="p-2 border">Diagnosis</th>
              <th class="p-2 border">Recommendation</th>
              <th class="p-2 border">Trigger</th>
              <th class="p-2 border">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(diagnosisItem, index) in state.diagnosisList" :key="index">
              <td class="p-2 border align-middle">{{ diagnosisItem.id }}</td>
              <td class="p-2 border align-middle">{{ diagnosisItem.diagnosis }}</td>
              <td class="p-2 border align-middle">{{ diagnosisItem.recommendation }}</td>
              <td class="p-2 border align-middle">{{ diagnosisItem.trigger }}</td>
              <td class="p-2 border align-middle">
                <div class="flex justify-center gap-5">
                  <NuxtLink
                    :to="`/admin/list-of-diagnosis/${diagnosisItem.id}`"
                    class="py-2 px-4 shadow-md tracking-wider rounded-2xl bg-[#B9E0A5] hover:opacity-75 font-semibold text-[#002951] transition duration-300 ease-in-out text-xs"
                  >
                    Edit
                  </NuxtLink>
                  <button
                    type="button"
                    @click="() => deleteDiagnosis(diagnosisItem.id)"
                    class="py-2 px-4 shadow-md tracking-wider rounded-2xl bg-[#FF9999] hover:opacity-75 font-semibold text-[#002951] transition duration-300 ease-in-out text-xs"
                  >
                    Delete
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive, onMounted } from 'vue';

const state = reactive({
  diagnosisList: null
});

onMounted(() => {
  fetchUser();
});

async function fetchUser() {
  try {
    const response = await $fetch(`http://127.0.0.1:8000/api/diagnosis`, {
      method: 'GET',
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('_token')
      }
    });
    if (response.data) {
      state.diagnosisList = response.data; // Fix this line
    }
  } catch (error) {
    state.errors = error.response;
    console.log('error', error);
  }
}

async function deleteDiagnosis(diagnosisItemId) {
  try {
    const response = await $fetch(`http://127.0.0.1:8000/api/diagnosis/${diagnosisItemId}/delete`, {
      method: 'delete',
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('_token')
      }
    });

    if (response.data) {
      state.diagnosisList = response.data;
      $router.go(); // Use $router directly to navigate
    }
  } catch (error) {
    state.errors = error.response;
    console.log('error', error);
  }
}



</script>
