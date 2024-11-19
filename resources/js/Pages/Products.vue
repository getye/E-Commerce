<script setup>
import { ref, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


const products = usePage().props.products; // Getting products data from Inertia

</script>

<template>
  <AuthenticatedLayout>
      <div class="container py-8 mx-auto">
        <h1 class="text-2xl font-semibold">Product List</h1>

        <!-- Product Table -->
        <div class="mt-4 overflow-x-auto">
          <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
              <tr>
                <th class="px-4 py-2 border-b">Product Name</th>
                <th class="px-4 py-2 border-b">Description</th>
                <th class="px-4 py-2 border-b">Price</th>
                <th class="px-4 py-2 border-b">Quantity</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="product in products" :key="product.id">
                <td class="px-4 py-2 border-b">{{ product.name }}</td>
                <td class="px-4 py-2 border-b">{{ product.description }}</td>
                <td class="px-4 py-2 border-b">{{ product.price }}</td>
                <td class="px-4 py-2 border-b">{{ product.quantity }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </AuthenticatedLayout>
</template>

<style scoped>
/* Add any additional styles here */
</style>
