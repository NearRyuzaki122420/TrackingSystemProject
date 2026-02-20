<script setup>
import { computed, ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage()
const user = computed(() => page.props.auth?.user)

const showingNavigationDropdown = ref(false);
</script>

<template>
  <div class="min-h-screen bg-gray-950 text-gray-100">
    <!-- Top Bar -->
    <header class="sticky top-0 z-50 border-b border-gray-800 bg-gray-950/80 backdrop-blur">
      <div class="mx-auto max-w-6xl px-4 py-3 flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="h-9 w-9 rounded-xl bg-blue-600/20 border border-blue-600/30 grid place-items-center">
            <span class="font-bold text-blue-300">TS</span>
          </div>
          <div class="leading-tight">
            <div class="font-semibold">Tracking System</div>
            <div class="text-xs text-gray-400">Dashboard</div>
          </div>
        </div>

        <nav class="flex items-center gap-2">
          <Link
            href="/dashboard"
            class="px-3 py-2 rounded-lg text-sm hover:bg-gray-900 border border-transparent hover:border-gray-800"
          >
            Dashboard
          </Link>

          <Link
            href="/trackings"
            class="px-3 py-2 rounded-lg text-sm hover:bg-gray-900 border border-transparent hover:border-gray-800"
          >
            Tracking
          </Link>

          <Link
            href="/profile"
            class="px-3 py-2 rounded-lg text-sm hover:bg-gray-900 border border-transparent hover:border-gray-800"
          >
            Profile
          </Link>

          <Link
            href="/logout"
            method="post"
            as="button"
            class="px-3 py-2 rounded-lg text-sm bg-gray-900 border border-gray-800 hover:bg-gray-800"
          >
            Logout
          </Link>
        </nav>
      </div>
    </header>

    <!-- Header Slot -->
    <div v-if="$slots.header" class="mx-auto max-w-6xl px-4 pt-8">
      <div class="rounded-2xl border border-gray-800 bg-gray-900/60 p-5">
        <slot name="header" />
        <div v-if="user" class="mt-2 text-sm text-gray-400">
          Logged in as <span class="text-gray-200">{{ user.name }}</span>
        </div>
      </div>
    </div>

    <!-- Main -->
    <main class="mx-auto max-w-6xl px-4 py-8">
      <slot />
    </main>
  </div>
</template>
