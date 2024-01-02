//wala pani labot

<template>
  <div v-if="isOpen" class="fixed inset-0 flex items-center justify-center z-60">
    <div class="bg-black opacity-50 fixed inset-0"></div>
    <div class="bg-white rounded-lg overflow-hidden relative z-70 p-6 max-w-md">
      <button @click="closeModal" class="absolute top-0 right-0 p-2">
        &times;
      </button>
      <h2 class="text-xl font-semibold mb-4">Nested Modal</h2>
      <!-- Nested Modal Content -->
    </div>
  </div>
</template>

<script>
import './assets/scroll-bar.css';

export default {
  props: {
    isOpen: {
      type: Boolean,
      required: true
    }
  },
  methods: {
    closeModal() {
      this.$emit('close');
    }
  }
};
</script>
