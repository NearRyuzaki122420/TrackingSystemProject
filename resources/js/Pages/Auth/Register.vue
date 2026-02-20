<script setup>
import { useForm, Link } from '@inertiajs/vue3'
import AuthLayout from '@/Layouts/AuthLayout.vue'

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})

const submit = () => {
  form.post('/register', {
    onFinish: () => form.reset('password', 'password_confirmation'),
  })
}
</script>

<template>
  <AuthLayout title="Create account">
    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="text-sm text-gray-300">Name</label>
        <input
          v-model="form.name"
          type="text"
          class="mt-1 w-full rounded-xl bg-gray-950 border border-gray-800 px-3 py-2 text-gray-100 placeholder:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-600/50"
          placeholder="Your name"
          autocomplete="name"
          required
        />
        <div v-if="form.errors.name" class="mt-1 text-xs text-red-300">
          {{ form.errors.name }}
        </div>
      </div>

      <div>
        <label class="text-sm text-gray-300">Email</label>
        <input
          v-model="form.email"
          type="email"
          class="mt-1 w-full rounded-xl bg-gray-950 border border-gray-800 px-3 py-2 text-gray-100 placeholder:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-600/50"
          placeholder="you@example.com"
          autocomplete="username"
          required
        />
        <div v-if="form.errors.email" class="mt-1 text-xs text-red-300">
          {{ form.errors.email }}
        </div>
      </div>

      <div>
        <label class="text-sm text-gray-300">Password</label>
        <input
          v-model="form.password"
          type="password"
          class="mt-1 w-full rounded-xl bg-gray-950 border border-gray-800 px-3 py-2 text-gray-100 placeholder:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-600/50"
          placeholder="••••••••"
          autocomplete="new-password"
          required
        />
        <div v-if="form.errors.password" class="mt-1 text-xs text-red-300">
          {{ form.errors.password }}
        </div>
      </div>

      <div>
        <label class="text-sm text-gray-300">Confirm Password</label>
        <input
          v-model="form.password_confirmation"
          type="password"
          class="mt-1 w-full rounded-xl bg-gray-950 border border-gray-800 px-3 py-2 text-gray-100 placeholder:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-600/50"
          placeholder="••••••••"
          autocomplete="new-password"
          required
        />
        <div v-if="form.errors.password_confirmation" class="mt-1 text-xs text-red-300">
          {{ form.errors.password_confirmation }}
        </div>
      </div>

      <button
        type="submit"
        :disabled="form.processing"
        class="w-full rounded-xl bg-blue-600 hover:bg-blue-500 disabled:opacity-60 px-4 py-2 font-semibold"
      >
        Create account
      </button>

      <div class="text-center text-sm text-gray-400">
        Already registered?
        <Link href="/login" class="text-blue-300 hover:text-blue-200 underline underline-offset-4">
          Sign in
        </Link>
      </div>
    </form>
  </AuthLayout>
</template>