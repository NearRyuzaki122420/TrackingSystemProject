<script setup>
import { useForm, Link } from '@inertiajs/vue3'
import AuthLayout from '@/Layouts/AuthLayout.vue'

const props = defineProps({
  status: String,
  canResetPassword: Boolean,
})

const form = useForm({
  email: '',
  password: '',
  remember: false,
})

const submit = () => {
  form.post('/login', {
    onFinish: () => form.reset('password'),
  })
}
</script>

<template>
  <AuthLayout title="Login">
    <div
      v-if="props.status"
      class="mb-4 rounded-xl border border-green-500/30 bg-green-500/10 p-3 text-sm text-green-200"
    >
      {{ props.status }}
    </div>

    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="text-sm text-gray-300">Email</label>
        <input
          v-model="form.email"
          type="email"
          class="mt-1 w-full rounded-xl bg-gray-950 border border-gray-800 px-3 py-2 text-gray-100 placeholder:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-600/50"
          placeholder="you@example.com"
          autocomplete="username"
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
          autocomplete="current-password"
        />
        <div v-if="form.errors.password" class="mt-1 text-xs text-red-300">
          {{ form.errors.password }}
        </div>
      </div>

      <div class="flex items-center justify-between">
        <label class="flex items-center gap-2 text-sm text-gray-300">
          <input v-model="form.remember" type="checkbox" class="rounded border-gray-700 bg-gray-950" />
          Remember me
        </label>

        <Link
          v-if="props.canResetPassword"
          href="/forgot-password"
          class="text-sm text-blue-300 hover:text-blue-200 underline underline-offset-4"
        >
          Forgot password?
        </Link>
      </div>

      <button
        type="submit"
        :disabled="form.processing"
        class="w-full rounded-xl bg-blue-600 hover:bg-blue-500 disabled:opacity-60 px-4 py-2 font-semibold"
      >
        Sign in
      </button>

      <div class="text-center text-sm text-gray-400">
        No account?
        <Link href="/register" class="text-blue-300 hover:text-blue-200 underline underline-offset-4">
          Create one
        </Link>
      </div>
    </form>
  </AuthLayout>
</template>