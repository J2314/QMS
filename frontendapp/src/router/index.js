import { createRouter, createWebHistory } from 'vue-router';
import Login from '../views/Login.vue';
import SignUp from '../views/Signup.vue';
import Dashboard from '../views/Dashboard.vue';
import AddDepartment from '../views/AddDepartment.vue';
import AddForm from '../views/AddForm.vue';
import Statistics from '../components/TheStats.vue'
import Announcement from '../components/Announcement.vue';
import Monitoring from '../components/Monitoring.vue';
import Calendar from '../components/Calendar.vue';

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
    component: Dashboard,
    children: [
      {
        path: 'statistics',
        name: 'Statistics',
        component: Statistics
      },
      {
        path: 'announcements',
        name: 'Announcement',
        component: Announcement
      },
      {
        path: 'monitoring',
        name: 'Monitoring',
        component: Monitoring
      },
      {
        path: 'calendar',
        name: 'Calendar',
        component: Calendar
      },
      {
        path: 'addDepartment', // Relative to /dashboard
        name: 'addDepartment',
        component: AddDepartment
      },
      {
        path: 'addForm', // Relative to /dashboard
        name: 'addForm',
        component: AddForm
      }
    ]
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
