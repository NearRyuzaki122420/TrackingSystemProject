<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

console.log("🔥 NEW TRACKING FILE LOADED");


const props = defineProps({
  trackings: { type: Array, default: () => [] }
})

const form = ref({
  id: null,
  tracking_number: '',
  customer_name: '',
  status: ''
})

function submit() {
  const payload = {
    tracking_number: form.value.tracking_number,
    customer_name: form.value.customer_name,
    status: form.value.status
  }

  if (!form.value.id) {
    router.post('/trackings', payload, {
      onSuccess: () => resetForm()
    })
    return
  }

  router.put(`/trackings/${form.value.id}`, payload, {
    onSuccess: () => resetForm()
  })
}

function edit(t) {
  form.value = {
    id: t.id,
    tracking_number: t.tracking_number,
    customer_name: t.customer_name,
    status: t.status
  }
}

function remove(id) {
  // hard block invalid id => prevents DELETE /
  if (!id) {
    console.error('Blocked delete: invalid id', id)
    return
  }

  if (!confirm('Delete this tracking?')) return

  router.delete(`/trackings/${id}`, {
    preserveScroll: true
  })
}

function resetForm() {
  form.value = { id: null, tracking_number: '', customer_name: '', status: '' }
}
</script>

<template>
  <div class="min-h-screen bg-gray-950 text-gray-100 p-6">
    <div class="max-w-3xl mx-auto">
      <h1 class="text-2xl font-bold mb-4">Tracking Management</h1>

      <form @submit.prevent="submit" class="bg-gray-900 border border-gray-800 p-4 rounded-xl mb-6">
        <input v-model="form.tracking_number" placeholder="Tracking Number"
               class="w-full mb-2 p-2 rounded bg-gray-950 border border-gray-800" />
        <input v-model="form.customer_name" placeholder="Customer Name"
               class="w-full mb-2 p-2 rounded bg-gray-950 border border-gray-800" />
        <input v-model="form.status" placeholder="Status"
               class="w-full mb-3 p-2 rounded bg-gray-950 border border-gray-800" />

        <div class="flex gap-2">
          <button type="submit" class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-lg">
            {{ form.id ? 'Update Tracking' : 'Add Tracking' }}
          </button>

          <button v-if="form.id" type="button" @click="resetForm"
                  class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-lg">
            Cancel
          </button>
        </div>
      </form>

      <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        <table class="w-full">
          <thead class="bg-gray-800">
            <tr>
              <th class="p-3 text-left">Tracking No</th>
              <th class="p-3 text-left">Customer</th>
              <th class="p-3 text-left">Status</th>
              <th class="p-3 text-left">Actions</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="t in props.trackings" :key="t.id" class="border-t border-gray-800">
              <td class="p-3">{{ t.tracking_number }}</td>
              <td class="p-3">{{ t.customer_name }}</td>
              <td class="p-3">{{ t.status }}</td>
              <td class="p-3">
                <div class="flex gap-3">
                  <button type="button" @click.stop.prevent="edit(t)"
                          class="text-blue-400 hover:text-blue-300">
                    Update
                  </button>

                  <button type="button" @click.stop.prevent="remove(t.id)"
                          class="text-red-400 hover:text-red-300">
                    Delete
                  </button>
                </div>
              </td>
            </tr>

            <tr v-if="props.trackings.length === 0">
              <td colspan="4" class="p-6 text-center text-gray-400">No records yet.</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</template>
