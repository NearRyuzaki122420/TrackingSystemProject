<template>
  <div class="p-6 max-w-xl mx-auto bg-white shadow rounded">
    <h1 class="text-xl font-bold mb-4">{{ message }}</h1>
    <inertia-link href="/" class="text-blue-500">Back to list</inertia-link>
  </div>
</template>

<script setup>
const props = defineProps({
    message: String
})
</script>
