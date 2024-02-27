<template>
<Navbar/>
<Sidebar/>
<div class="container">
    <h1> HELLO, GENERAL</h1>
</div>
</template>

<script>
import Navbar from '../components/TheNavbar.vue'
import Sidebar from '../components/TheSidebar.vue'
export default {
    name: 'GeneralPage',
    components: {
        Navbar,
        Sidebar,
    }
}
</script>

<style scoped>

</style>