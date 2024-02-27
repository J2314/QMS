import { createRouter, createWebHistory } from 'vue-router';
import Login from '../views/Login.vue';
import SignUp from '../views/Signup.vue';
import Dashboard from '../views/Dashboard.vue'
import addDepartment from '../views/AddDepartment.vue'
import addForm from '../views/AddForm.vue'

const routes = [
  {
    path: '/',
    name: 'Login',
    component: Login
  },
  {
    path: '/signup',
    name: 'SignUp',
    component: SignUp
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard
  },
  {
    path: '/addDepartment',
    name: 'addDepartment',
    component: addDepartment
  },
  {
    path: '/addForm',
    name: 'addForm',
    component: addForm
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
