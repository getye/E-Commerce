<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <AppLayout :can-login="canLogin" :can-register="canRegister">
        <main class="mt-6">
            <div class="container mx-auto">
                <h1>Welcome to the Home Page!</h1>
            </div>
        </main>
    </AppLayout>
</template>
