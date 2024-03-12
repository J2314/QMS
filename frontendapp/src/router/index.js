import { createRouter, createWebHistory } from 'vue-router';
import Login from '../views/Login.vue';
import SignUp from '../views/Signup.vue';
import Dashboard from '../views/AdminDashboard.vue';
import AddDepartment from '../views/AddDepartment.vue';
import AddForm from '../views/AddForm.vue';
import Statistics from '../components/TheStats.vue'
import Announcement from '../components/Announcement.vue';
import Monitoring from '../components/Monitoring.vue';
import Calendar from '../components/Calendar.vue';
import UploadForm from '../views/UploadForm.vue'
import AddPolicy from '../views/AddPolicy.vue'
import AddProcedures from '../views/AddProcedures.vue'

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
        path: '',
        name: 'DashboardDefault',
        component: Statistics,
      },
      {
        path: 'statistics',
        name: 'Statistics',
        component: Statistics,
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
        path: 'addDepartment', 
        name: 'addDepartment',
        component: AddDepartment
      },
      {
        path: 'addForm', 
        name: 'addForm',
        component: AddForm
      },
      {
        path: '/upload/:formId/:departmentName/:fileName',
        name: 'uploadForm',
        component: UploadForm,
      },
      {
        path: 'addPolicy', 
        name: 'addPolicy',
        component: AddPolicy
      },
      {
        path: 'addProcedures', 
        name: 'addProcedures',
        component: AddProcedures
      },
    ]
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
