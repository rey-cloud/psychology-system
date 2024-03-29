<template>
  <div class="container mx-auto p-4 flex justify-center items-center min-h-screen bg-[#e4e4e4]">
    <div class="max-w-md w-full bg-white p-8 border rounded shadow-md">
      <div class="mb-5 flex justify-between">
        <nuxt-link to="/admin/list-of-diagnosis">
          <button
            class="border-2 rounded-md px-3 py-1 bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors text-white tracking-wide">
            &lt; Back
          </button>
        </nuxt-link>
        <h4 class="text-2xl font-bold">Edit Diagnosis</h4>
      </div>

      <form @submit.prevent="updateDiagnosis" v-if="state.diagnosis">
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Diagnosis:</label>
          <input v-model="state.diagnosis.diagnosis" class="mt-1 p-2 border-2 rounded w-full"
            :class="{ 'border-red-500': state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.diagnosis }" />
          <div class="text-red-500 text-sm font-semibold tracking-wide">{{ state.errors && state.errors._data &&
            state.errors._data.errors &&
            state.errors._data.errors.diagnosis && state.errors._data.errors.diagnosis[0] }}</div>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Recommendation:</label>
          <input v-model="state.diagnosis.recommendation" class="mt-1 p-2 border-2 rounded w-full"
            :class="{ 'border-red-500': state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.recommendation }" />
          <div class="text-red-500 text-sm font-semibold tracking-wide">{{ state.errors && state.errors._data &&
            state.errors._data.errors &&
            state.errors._data.errors.recommendation && state.errors._data.errors.recommendation[0] }}</div>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600">Trigger:</label>
          <input v-model="state.diagnosis.trigger" class="mt-1 p-2 border-2 rounded w-full"
            :class="{ 'border-red-500': state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.trigger }" />
          <div class="text-red-500 text-sm font-semibold tracking-wide">{{ state.errors && state.errors._data &&
            state.errors._data.errors &&
            state.errors._data.errors.trigger && state.errors._data.errors.trigger[0] }}</div>
        </div>

        <button type="submit"
          class="border-2 rounded-md px-3 w-full py-1 bg-[#515b62] border-[#2c3840] hover:bg-[#656e74] transition-colors text-white tracking-wider">Update</button>
      </form>
      <div v-else>
        <!-- Display an error message or redirect the user to an error page -->
        <p>Error loading diagnosis data.</p>
      </div>
    </div>
  </div>
</template>
  
<script setup>
import { reactive, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';  

const route = useRoute();
const router = useRouter();  

const state = reactive({
  errors: null,
  diagnosis: {
    diagnosis: '',
    recommendation: '',
    trigger: '',
  },
});

const getDiagnosis = async () => {
  const diagnosisId = route.params.id;
  try {
    const response = await $fetch(`http://127.0.0.1:8000/api/diagnosis/${diagnosisId}`);
    console.log('API response:', response);

    if (response.data && response.data.diagnosis) {
      state.diagnosis = response.data.diagnosis;
    } else if (response.data && response.data.message) {
      console.error('API Error:', response.data.message);
    } else {
      console.error('No data received from the API.');
    }
  } catch (error) {
    console.error('Error fetching data from the API:', error);
  }
};

onMounted(getDiagnosis);

async function updateDiagnosis() {
  const diagnosisId = route.params.id;

  const params = {
    diagnosis: state.diagnosis.diagnosis,
    recommendation: state.diagnosis.recommendation,
    trigger: state.diagnosis.trigger,
  };

  try {
    const response = await $fetch(`http://127.0.0.1:8000/api/diagnosis/${diagnosisId}/edit`, {
      method: 'PUT',
      body: params,
    });

    if (response.data) {
      router.push('/admin/list-of-diagnosis'); // Use router.push for navigation
    }
  } catch (error) {
    state.errors = error.response;
    console.error(error.response);
    console.error('error', error);
  }
}
</script>

  