<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Add Product" />

    <AuthenticatedLayout>

        <div class="sm:py-12 xs:py-8">
            <div class="w-full mx-auto sm:w-1/2 max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                       <h1>Users Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

