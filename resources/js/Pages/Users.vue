<script setup>
import { ref, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AuthenticatedLayoutAdmin.vue';


const products = usePage().props.products; // Getting products data from Inertia

</script>

<template>
  <AdminLayout>
      <div class="container py-8 mx-auto">
        <h1 class="text-2xl font-semibold">Users List</h1>

        <!-- Product Table -->
        <div class="mt-4 overflow-x-auto">
          <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
              <tr>
                <th class="px-4 py-2 border-b">User Name</th>
                <th class="px-4 py-2 border-b">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="product in products" :key="product.id">
                <td class="px-4 py-2 border-b">{{ product.name }}</td>
                <td class="px-4 py-2 border-b">{{ product.quantity }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </AdminLayout>
</template>

<style scoped>
/* Add any additional styles here */
</style>
