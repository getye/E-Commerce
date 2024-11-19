<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
        default: false,
    },
    canRegister: {
        type: Boolean,
        default: false,
    },
});

</script>

<template>
    <header class="flex items-center justify-between px-6 py-5 text-white bg-gray-800">
        <div class="hidden sm:block">
            <h1 class="text-xl font-bold">E-Commerce App</h1>
        </div>
        <nav class="flex gap-4">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="text-white hover:text-gray-300"
            >
                Dashboard
            </Link>
            <template v-else>
                <Link
                    v-if="canLogin"
                    :href="route('login')"
                    class="text-white hover:text-gray-300"
                >
                    Login
                </Link>
                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="text-white hover:text-gray-300"
                >
                    Register
                </Link>
            </template>
            <Link
                v-if="$page.props.auth.user"
                :href="route('logout')"
                method="post"
                as="button"
                class="text-white hover:text-gray-300"
            >
                Logout
            </Link>
        </nav>
    </header>
</template>
