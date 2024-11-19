import { createRouter, createWebHistory } from 'vue-router';
import Welcome from '@/Pages/Welcome.vue';
import SupplierDashboard from '@/Pages/Dashboard.vue';

const routes = [
  {
    path: '/',
    name: 'Welcome',
    component: Welcome,
  },
  {
    path: '/supplier/dashboard',
    name: 'SupplierDashboard',
    component: SupplierDashboard,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
