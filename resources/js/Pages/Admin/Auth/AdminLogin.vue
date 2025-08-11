<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2'
import { usePage } from '@inertiajs/vue3'
import { onMounted } from 'vue'

import { useI18n } from 'vue-i18n';

const { t } = useI18n()


const page = usePage()

onMounted(() => {
    if (page.props.flash?.error) {
        Swal.fire({
            icon: 'error',
            title: 'បរាជ័យ!',
            text: page.props.flash.error,
            confirmButtonText: 'យល់ព្រម'
        })
    }

    if (page.props.flash?.success) {
        Swal.fire({
            icon: 'success',
            title: 'ជោគជ័យ!',
            text: page.props.flash.success,
            confirmButtonText: 'យល់ព្រម'
        })
    }
})
defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('admin.login.process'), {
        onFinish: () => form.reset('password'),
    });
};
</script>



<template>
  <div class="min-h-screen flex flex-col justify-center items-center bg-gray-50 dark:bg-gray-900 px-4">
    <!-- Branding -->
    <div class="mb-6 text-center">
      <h1 class="text-3xl font-bold text-black dark:text-white">welcome</h1>
      <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
        {{ t('login.welcomeBack') }}
      </p>
    </div>

    <form @submit.prevent="submit" class="w-full max-w-md bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
      <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
        {{ status }}
      </div>

      <!-- Email -->
      <div>
        <InputLabel for="email" :value="t('login.email')" />
        <TextInput
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          required
          autofocus
          autocomplete="username"
        />
        <InputError class="mt-2" :message="form.errors.email" />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <InputLabel for="password" :value="t('login.password')" />
        <TextInput
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="current-password"
        />
        <InputError class="mt-2" :message="form.errors.password" />
      </div>

      <!-- Remember Me -->
      <div class="mt-4 block">
        <label class="flex items-center">
          <Checkbox name="remember" v-model:checked="form.remember" />
          <span class="ms-2 text-sm text-gray-600 dark:text-gray-300">
            {{ t('login.rememberMe') }}
          </span>
        </label>
      </div>

      <!-- Actions -->
      <div class="mt-6 flex items-center justify-between">
        <Link
          v-if="canResetPassword"
          :href="route('password.request')"
          class="text-sm text-blue-600 hover:underline dark:text-blue-400"
        >
          {{ t('login.forgotPassword') }}
        </Link>

        <PrimaryButton
          :disabled="form.processing"
          class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold"
          :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
        >
          {{ t('login.login') }}
        </PrimaryButton>
      </div>
    </form>
  </div>
</template>
