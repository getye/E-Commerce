<template>
    <div>
      <h1>Product List</h1>
      <button @click="createProduct" class="btn btn-primary">Add Product</button>
      <table class="table mt-4">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products.data" :key="product.id">
            <td>{{ product.name }}</td>
            <td>{{ product.description }}</td>
            <td>{{ product.price }}</td>
            <td>{{ product.quantity }}</td>
            <td>
              <button @click="editProduct(product)" class="btn btn-warning btn-sm">Edit</button>
              <button @click="deleteProduct(product.id)" class="btn btn-danger btn-sm">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
      <div v-if="products.links">
        <button
          v-for="link in products.links"
          :key="link.url"
          :class="['btn', link.active ? 'btn-primary' : 'btn-secondary']"
          @click="fetchProducts(link.url)"
        >
          {{ link.label }}
        </button>
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        products: {
          data: [],
          links: [],
        },
      };
    },
    methods: {
      fetchProducts(url = "/api/products") {
        axios.get(url).then((response) => {
          this.products = response.data;
        });
      },
      createProduct() {
        this.$router.push("/products/create");
      },
      editProduct(product) {
        this.$router.push(`/products/${product.id}/edit`);
      },
      deleteProduct(id) {
        if (confirm("Are you sure you want to delete this product?")) {
          axios.delete(`/api/products/${id}`).then(() => {
            this.fetchProducts();
          });
        }
      },
    },
    mounted() {
      this.fetchProducts();
    },
  };
  </script>
  