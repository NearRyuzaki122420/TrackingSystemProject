<script setup>
import { Head, Link } from '@inertiajs/vue3'

defineProps({
  title: String,
})
</script>

<template>
  <Head :title="title" />
  <div class="min-h-screen bg-gray-950 text-gray-100 flex items-center justify-center p-6">
    <div class="w-full max-w-md">
      <div class="mb-6 text-center">
        <div class="mx-auto h-12 w-12 rounded-2xl bg-blue-600/20 border border-blue-600/30 grid place-items-center">
          <span class="font-bold text-blue-300 text-lg">TS</span>
        </div>
        <h1 class="mt-4 text-2xl font-bold">{{ title }}</h1>
        <p class="mt-1 text-sm text-gray-400">Welcome — let’s get you in.</p>
      </div>

      <div class="rounded-2xl border border-gray-800 bg-gray-900/60 shadow-lg p-6">
        <slot />
      </div>

      <div class="mt-6 text-center text-xs text-gray-500">
        <span>Tracking System • </span>
        <Link href="/trackings" class="text-gray-400 hover:text-gray-200 underline underline-offset-4">
          View App
        </Link>
      </div>
    </div>
  </div>
</template>