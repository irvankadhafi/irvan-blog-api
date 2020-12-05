<template>
    <div>
        <router-view />
    </div>
</template>

<script>
// containers
import MainWrapper from "./containers/MainWrapper.vue";
import MainContent from "./containers/MainContent.vue";

// components
import TopBar from "./components/Topbar/TopBar.vue";
import SideBar from "./components/Sidebar/SideBar.vue";
export default {
    name: "admin.index",
    components: {
        MainWrapper,
        MainContent,
        TopBar,
        SideBar
    },
}
</script>

<style scoped>

</style>
