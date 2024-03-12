<template>
    <the-loader v-if="showLoading"></the-loader>
    <router-view></router-view>
</template>

<script>
import TheLoader from './components/TheLoader.vue'
import { mapState } from 'vuex';

export default {
    name: 'App',
    computed: {
        ...mapState({
            showLoading: state => state.showLoading
        })
    },
    components: {
        TheLoader, // eslint-disable-line vue/no-unused-components
    },
}
</script>

 <style>
/*
@import "@/assets/scss/gigz.scss";
@import "@/assets/scss/custom.scss";
@import url("./assets/plugins/Leaflet/leaflet.css");
@import url("./assets/plugins/icons/@fortawesome/fontawesome-free/css/all.min.css");
*/
</style> 