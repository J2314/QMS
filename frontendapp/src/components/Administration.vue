<template>
    <Navbar/>
    <Sidebar/>
    <AddNav/>
    <div class="container">
        <h1>hello admin</h1>
    </div>
</template>

<script>
import Navbar from '../components/TheNavbar.vue'
import Sidebar from '../components/TheSidebar.vue'
import AddNav from '../components/AdditionalNavbar.vue'
export default {
    name: 'AdministrationPage', 
    components: {
        Navbar,
        Sidebar,
        AddNav,
    }
}

</script>