<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayoutAdmin.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Admin" />

    <AdminLayout>

        <div class="sm:py-12 xs:py-8">
            <div class="w-full mx-auto sm:w-1/2 max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                       <h1>Admin Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

