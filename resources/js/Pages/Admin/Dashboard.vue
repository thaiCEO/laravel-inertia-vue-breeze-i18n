<script setup>
import { computed, onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import { usePage } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import AdminLayout from './Layout/AdminLayout.vue'

onMounted(() => initFlowbite())
const { t } = useI18n()



</script>


<template>
  <AdminLayout>
    <!-- Summary Boxes -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
      <div class="p-6 min-h-[150px] bg-white dark:bg-gray-800 rounded-2xl shadow flex flex-col justify-center">
        <h2 class="text-gray-500 dark:text-gray-300 text-base mb-2">hhh</h2>
        <p class="text-3xl font-bold text-gray-900 dark:text-white">fff</p>
      </div>
      <div class="p-6 min-h-[150px] bg-white dark:bg-gray-800 rounded-2xl shadow flex flex-col justify-center">
        <h2 class="text-gray-500 dark:text-gray-300 text-base mb-2">xxx</h2>
        <p class="text-3xl font-bold text-gray-900 dark:text-white">fff</p>
      </div>
      <div class="p-6 min-h-[150px] bg-white dark:bg-gray-800 rounded-2xl shadow flex flex-col justify-center">
        <h2 class="text-gray-500 dark:text-gray-300 text-base mb-2">fff</h2>
        <p class="text-3xl font-bold text-gray-900 dark:text-white">11</p>
      </div>
      <div class="p-6 min-h-[150px] bg-white dark:bg-gray-800 rounded-2xl shadow flex flex-col justify-center">
        <h2 class="text-gray-500 dark:text-gray-300 text-base mb-2">sss</h2>
        <p class="text-3xl font-bold text-gray-900 dark:text-white">11</p>
      </div>
    </section>

    <!-- Full-Width Chart -->
    <section class="grid grid-cols-1 md:w-full lg:grid-cols-12 gap-6 mt-6 dark:bg-gray-800">
      <div class="lg:col-span-12 bg-white rounded-2xl shadow p-6 dark:bg-gray-800">
       
      </div>
    </section>
  </AdminLayout>
</template>

