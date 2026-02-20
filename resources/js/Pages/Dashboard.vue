<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <div>
          <h2 class="text-xl font-semibold">Dashboard</h2>
          <p class="text-sm text-gray-400">Quick access to your tools.</p>
        </div>

        <Link
          href="/trackings"
          class="rounded-xl bg-blue-600 hover:bg-blue-500 px-4 py-2 font-semibold"
        >
          Tracking Management
        </Link>
      </div>
    </template>

    <div class="grid gap-4 md:grid-cols-2">
      <div class="rounded-2xl border border-gray-800 bg-gray-900/60 p-5">
        <div class="text-sm text-gray-400">Status</div>
        <div class="mt-2 text-2xl font-bold">You’re logged in ✅</div>
        <div class="mt-2 text-sm text-gray-400">
          Manage shipments and update tracking statuses in one place.
        </div>
      </div>

      <div class="rounded-2xl border border-gray-800 bg-gray-900/60 p-5">
        <div class="text-sm text-gray-400">Shortcut</div>
        <div class="mt-2 text-2xl font-bold">Open Tracking</div>
        <div class="mt-3">
          <Link
            href="/trackings"
            class="inline-block rounded-xl bg-gray-900 border border-gray-800 hover:bg-gray-800 px-4 py-2"
          >
            Go to Tracking →
          </Link>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>