<template>
  <Navbar/>
  <Sidebar/>
  <AddNav />
  <RouterView></RouterView>
</template>
<script>
import Navbar from '../components/TheNavbar.vue'
import Sidebar from '../components/TheSidebar.vue'
import AddNav from '../components/AdditionalNavbar.vue'
export default {
  name: 'AdminDashboardPage',
  components: {
    Navbar,
    Sidebar,
    AddNav,
  }
}
</script>
<style scoped>
</style>
