<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    trackings: Array
})

const form = ref({
    tracking_number: '',
    customer_name: '',
    status: ''
})

function submit() {
    router.post('/trackings', form.value)
}

function remove(id) {
    router.delete(`/trackings/${id}`)
}
</script>

<template>
<div class="p-6 max-w-3xl mx-auto">

    <h1 class="text-2xl font-bold mb-4">Tracking Management</h1>

    <!-- Form -->
    <div class="bg-white shadow p-4 rounded mb-6">
        <input v-model="form.tracking_number" placeholder="Tracking Number" class="border p-2 w-full mb-2">
        <input v-model="form.customer_name" placeholder="Customer Name" class="border p-2 w-full mb-2">
        <input v-model="form.status" placeholder="Status" class="border p-2 w-full mb-2">

        <button @click="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Add Tracking
        </button>
    </div>

    <!-- Table -->
    <div class="bg-white shadow rounded">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2">Tracking No</th>
                    <th class="p-2">Customer</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="t in trackings" :key="t.id" class="border-t">
                    <td class="p-2">{{ t.tracking_number }}</td>
                    <td class="p-2">{{ t.customer_name }}</td>
                    <td class="p-2">{{ t.status }}</td>
                    <td class="p-2">
                        <button @click="remove(t.id)" class="text-red-500">
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
</template>
