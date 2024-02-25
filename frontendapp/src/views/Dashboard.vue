<template>
    <Navbar/>
<div>
    <div>DASHBOARD</div>
</div>
</template>

<script>
import { mapGetters } from 'vuex';
import {GET_USER_TOKEN_GETTER} from '@/store/storeconstants';
import Navbar from '../components/TheNavbar.vue'
export default {
    name: 'DashboardPage',
    components: {
        Navbar
    },
    computed: {
        ...mapGetters('auth', {
            token: GET_USER_TOKEN_GETTER
        })
    }
}
</script>

<style scoped>

</style>