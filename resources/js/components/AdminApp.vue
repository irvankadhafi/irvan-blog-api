<template>
    <div id="irvan">
        <main-wrapper>
            <top-bar />
            <side-bar/>
            <main-content>
<!--                <router-view name="admin" />-->
                <transition name="page" mode="out-in">
                    <router-view :key="$route.fullPath" />
                </transition>
            </main-content>
        </main-wrapper>
    </div>
</template>

<script>
// containers
import MainWrapper from "../views/admin/containers/MainWrapper.vue";
import MainContent from "../views/admin/containers/MainContent.vue";

// components
import TopBar from "../views/admin/components/Topbar/TopBar.vue";
import SideBar from "../views/admin/components/Sidebar/SideBar.vue";
export default {
    name: "AdminApp",
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
