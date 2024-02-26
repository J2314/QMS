<template>
  <div>
    <Navbar/>
    <div class="sidebar">
      <ul class="list-unstyled">
        <li><router-link to="/dashboard">General</router-link></li>
        <li>
          <a href="#" @click="toggleDepartments">Departments <span v-if="showDepartments" class="arrow">▲</span><span v-else class="arrow">▼</span></a>
          <ul v-if="showDepartments" class="list-unstyled">
            <li><router-link to="/it-department">IT Department</router-link></li>
            <li><router-link to="/accounting-department">Accounting Department</router-link></li>
            <li><router-link to="/registrar-office">Registrar's Office</router-link></li>
            <li><router-link to="/school-director">School Director's Office</router-link></li>
            <li><router-link to="/academic-heads">Academic Heads</router-link></li>
            <li><router-link to="/faculty">Faculty</router-link></li>
            <!-- Add more departments as needed -->
          </ul>
        </li>
      </ul>
    </div>
    <div class="logout-section">
      <a href="#" @click="logout">Logout</a>
    </div>
  </div>
</template>

<script>
import Navbar from '../components/TheNavbar.vue'
export default {
  name: "DashboardPage",
  components: {
    Navbar
  },
  data() {
    return {
      showDepartments: false
    };
  },
  methods: {
    logout() {
      this.$router.push({ name: 'Login' }); 
    },
    toggleDepartments() {
      this.showDepartments = !this.showDepartments;
    }
  }
}
</script>

<style scoped>
.sidebar {
  margin-top: 4.5px;
  height: calc(100vh - 60px); 
  width: 200px;
  position: fixed;
  top: 60px;
  left: 0;
  background-color: #333;
  padding-top: 20px; 
  padding-bottom: 20px;
  overflow-y: auto;
  border-right: 2px solid #555; 
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); 
}

.sidebar ul {
  padding-left: 0;
  margin: 0;
}

.sidebar ul li {
  margin-bottom: 10px;
  list-style: none; 
}

.sidebar a {
  color: #fff;
  text-decoration: none;
  padding: 10px 20px;
  display: block;
  transition: all 0.3s ease; /* Updated transition property */
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Updated font-family */
}

.sidebar a:hover {
  background-color: rgba(255, 255, 255, 0.1);
  text-decoration: none;
  color: #ffd700; /* Change text color on hover */
}

.logout-section {
  position: fixed;
  bottom: 20px;
  left: 20px;
}

.logout-section a {
  color: #fff;
  text-decoration: none;
  padding: 10px 20px;
  display: block;
  border: 1px solid #fff;
  border-radius: 5px;
  transition: all 0.3s ease; /* Updated transition property */
}

.logout-section a:hover {
  background-color: rgba(255, 255, 255, 0.1);
  text-decoration: none;
  color: #ffd700; /* Change text color on hover */
}

.sidebar ul ul {
  display: none; /* Hide dropdown by default */
  padding-left: 20px;
  background-color: #444; /* Background color for dropdown */
}

.sidebar ul li:hover ul {
  display: block; /* Show dropdown on hover */
}

.arrow {
  float: right; /* Align the arrow to the right */
}
</style>
