<script setup>
import { reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';



// Define the reactive form data
const productForm = useForm({
    name: '',
    immage: null,
    description: '',
    price: 0,
    quantity: 0,
    processing: false,
});

const handleImageUpload = (event) => {
    const file = event.target.files[0];
    productForm.value.image = file; // Attach the file to the form object
};

// Function to handle form submission
const submitProduct = async () => {
    try {
        productForm.value.processing = true;

        // Create FormData object to send the data, including the file
        const formData = new FormData();
        Object.keys(productForm.value).forEach((key) => {
            formData.append(key, productForm.value[key]);
        });

        // Make the POST request
        const response = await fetch('/add/product', {
            method: 'POST',
            body: formData,
        });

        if (response.ok) {
            alert('Product added successfully!');
            productForm.reset();
        } else {
            console.error('Failed to add product');
        }
    } catch (error) {
        console.error('Error:', error);
    } finally {
        productForm.value.processing = false;
    }
};
</script>

<template>
    <Head title="Add Product" />

    <AuthenticatedLayout>

        <div class="sm:py-12 xs:py-8">
            <div class="w-full mx-auto sm:w-1/2 max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <form @submit.prevent="submitProduct" class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                                <input
                                    id="name"
                                    type="text"
                                    v-model="productForm.name"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    required
                                />
                            </div>

                            <div class="mt-4">
                                <label for="image" class="block text-sm font-medium text-gray-700">
                                    Product Image
                                </label>
                                <input
                                    id="image"
                                    type="file"
                                    class="block w-full mt-1"
                                    @change="handleImageUpload"
                                    accept="image/*"
                                />
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea
                                    id="description"
                                    v-model="productForm.description"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                ></textarea>
                            </div>

                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                <input
                                    id="price"
                                    type="number"
                                    v-model="productForm.price"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    required
                                    step="0.01"
                                />
                            </div>

                            <div>
                                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                <input
                                    id="quantity"
                                    type="number"
                                    v-model="productForm.quantity"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    required
                                />
                            </div>

                            <div>
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-4 py-2 text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    :disabled="productForm.processing"
                                >
                                    Add Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

