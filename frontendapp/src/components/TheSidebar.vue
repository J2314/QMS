<template>
  <div>
    <div class="sidebar">
      <ul class="list-unstyled">
        <li><router-link to="/dashboard">Dashboard</router-link></li>
        <li>
          <a href="#" @click="toggleDepartments">Departments <span v-if="showDepartments" class="arrow">▲</span><span v-else class="arrow">▼</span></a>
          <ul v-show="showDepartments" class="list-unstyled">
            <li><router-link to="/dashboard/addDepartment">+ Add Department</router-link></li>
          </ul>
        </li>
        <li>
          <a href="#" @click="toggleForms">Forms <span v-if="showForms" class="arrow">▲</span><span v-else class="arrow">▼</span></a>
          <ul v-show="showForms" class="list-unstyled">
            <li><router-link to="/dashboard/addForm">+ Add Forms</router-link></li>
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
export default {
  name: "DashboardPage",
  data() {
    return {
      showDepartments: false,
      showForms: false 
    };
  },
  methods: {
    logout() {
      this.$router.push({ name: 'Login' }); 
    },
    toggleDepartments() {
      this.showDepartments = !this.showDepartments;
    },
    toggleForms() {
      this.showForms = !this.showForms;
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
    transition: all 0.3s ease; 
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
  }
  
  .sidebar a:hover {
    background-color: rgba(255, 255, 255, 0.1);
    text-decoration: none;
    color: #ffd700; 
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
    transition: all 0.3s ease; 
  }
  
  .logout-section a:hover {
    background-color: rgba(255, 255, 255, 0.1);
    text-decoration: none;
    color: #ffd700; 
  }
  
  .arrow {
    float: right; 
  }
  </style>
  