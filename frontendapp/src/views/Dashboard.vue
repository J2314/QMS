<template>
  <Navbar/>
  <Sidebar/>
</template>

<script>
import Navbar from '../components/TheNavbar.vue'
import Sidebar from '../components/TheSidebar.vue'
export default {
  name: 'DashboardPAge',
  components: {
    Navbar,
    Sidebar,
  }
}
</script>

<style>

</style>