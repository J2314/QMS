<template>
    <Navbar />
    <Sidebar />
    <AddNav/>
</template>


<script>
import Navbar from '../components/TheNavbar.vue'
import Sidebar from '../components/TheSidebar.vue'
import AddNav from '../components/AdditionalNavbar.vue'
export default {
  name: 'DashboardPage',
  components: {
    Navbar,
    Sidebar,
    AddNav
  }
}
</script>

<style scoped>

</style>
