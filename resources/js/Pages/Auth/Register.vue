<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'; 
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';


defineProps({
    status: {
        type: String,
    },
    canLogin: { 
        type: Boolean, 
        default: true, // Allow login link to show 
    },
    canRegister: { 
        type: Boolean, 
        default: true, // Allow register link to show 
    },
});

const form = useForm({
    name: '',
    phone: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onSuccess: () => {
            alert('Registered successfully!');
            form.reset();
        },
    });
};

const options = ['Industry', 'Supplier'];
const selectedOption = ref(options[0]);
</script>

<template>
    <AppLayout :can-login="canLogin" :can-register="canRegister">
        <Head title="Register" />
        <div class="flex items-center justify-center pt-3">
            <form
                @submit.prevent="submit"
                    class="w-full px-6 py-4 overflow-hidden bg-gray-100 shadow-md sm:max-w-md sm:rounded-lg"
                >
                <h3>Registration</h3>
                <div>
                    <InputLabel for="name" value="Name" />

                    <TextInput
                        id="name"
                        type="text"
                        class="block w-full mt-1"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                    <label for="phone">Phone</label>
                    <input 
                        id="phone" 
                        class="block w-full mt-1"
                        v-model="form.phone" 
                        type="text" 
                        required />
                </div>
                <div class="flex flex-col mt-4">
                    <label for="role" class="mb-2 text-sm font-medium text-gray-700">
                    Use Type
                    </label>
                    <select
                    id="role"
                    v-model="selectedOption"
                    class="block w-full mt-1 text-gray-900 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                    <option
                        v-for="option in options"
                        :key="option"
                        :value="option"
                    >
                        {{ option }}
                    </option>
                    </select>
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        class="block w-full mt-1"
                        v-model="form.email"
                        required
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        class="block w-full mt-1"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel
                        for="password_confirmation"
                        value="Confirm Password"
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="block w-full mt-1"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.password_confirmation"
                    />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link
                        :href="route('login')"
                        class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Already registered?
                    </Link>

                    <PrimaryButton
                        class="ms-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        Register
                    </PrimaryButton>
                </div>
            </form>

        </div>
    </AppLayout>
</template>
