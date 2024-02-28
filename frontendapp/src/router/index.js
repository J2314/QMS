import { createRouter, createWebHistory } from 'vue-router';
import Login from '../views/Login.vue';
import SignUp from '../views/Signup.vue';
import Dashboard from '../views/Dashboard.vue'
import addDepartment from '../views/AddDepartment.vue'
import addForm from '../views/AddForm.vue'
import Statistics from '../components/TheStats.vue'
import Announcement from '../components/Announcement.vue'
import Administration from '../components/Administration.vue'
import Calendar from '../components/Calendar.vue'

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
  },
  {
    path: '/statistics',
    name: 'Statistics',
    component: Statistics
  },
  {
    path: '/announcements',
    name: 'Announcement',
    component: Announcement
  },
  {
    path: '/administration',
    name: 'Administration',
    component: Administration
  },
  {
    path: '/calendar',
    name: 'Calendar',
    component: Calendar
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
