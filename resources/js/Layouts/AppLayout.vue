<script setup>
import Navigation from '@/Components/Navigation.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <Navigation :can-login="canLogin" :can-register="canRegister" />
    <section>
        <slot />
    </section>
</template>
