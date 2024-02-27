<template>
  <div>
    <Navbar/>
    <Sidebar/>
    <nav class="additional-navbar">
      <div class="container">
        <div class="row">
          <div class="col">
            <a href="#" class="navbar-link">Statistics</a>
          </div>
          <div class="col">
            <a href="#" class="navbar-link">Announcements</a>
          </div>
          <div class="col">
            <a href="#" class="navbar-link">Administration</a>
          </div>
          <div class="col">
            <a href="#" class="navbar-link">Calendar</a>
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
import Navbar from '../components/TheNavbar.vue'
import Sidebar from '../components/TheSidebar.vue'
export default {
  name: 'DashboardPage',
  components: {
    Navbar,
    Sidebar,
  }
}
</script>

<style scoped>
.additional-navbar {
  background-color: #087f23; 
  padding: 25px; 
  margin-top: 30px; 
  margin-right: 15%; 
  margin-left: 20%; 
  border-radius: 20px; 
}

.navbar-link {
  color: #fff; 
  text-decoration: none;
  font-size: 22px; 
  transition: color 0.3s; 
  display: block; 
  text-align: center; 
  position: relative; 
}

.navbar-link::after {
  content: '';
  position: absolute;
  left: 50%; 
  transform: translateX(-50%); 
  bottom: -5px; 
  width: 50%; 
  height: 4px; 
  background-color: transparent; 
  transition: background-color 0.3s, width 0.3s, height 0.3s; 
}

.navbar-link:hover::after,
.navbar-link:focus::after { 
  background-color: #ffd700;
  width: 70%;
  height: 6px;
}
</style>
