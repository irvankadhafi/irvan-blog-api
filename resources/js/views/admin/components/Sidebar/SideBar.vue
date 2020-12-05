<template>
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <router-link to="/admin/dashboard">Stisla</router-link>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <router-link to="/admin/dashboard">Stisla</router-link>
            </div>
            <ul class="sidebar-menu">
                <!-- dashboard -->
                <title-menu-sidebar title="Dashboard" />
<!--                <menu-sidebar-->
<!--                    path="/dashboard/home"-->
<!--                    icon="tachometer-alt"-->
<!--                    menuName="Dashboard"-->
<!--                />-->
                <li>
                    <router-link class="nav-link" :to="{name : 'admin.home'}" exact="true">
                        <i :class="`fas fa-tachometer-alt`"></i>
                        <span>Dashboard</span>
                    </router-link>
                </li>
                <!-- end of dashboard -->

                <!-- layout -->
                <title-menu-sidebar title="Manage" />
<!--                <menu-sidebar path="dashboard/post" icon="book" menuName="Books" />-->
                <li>
                    <router-link class="nav-link" :to="{name : 'admin.post.create'}" exact="true">
                        <i :class="`fas fa-book`"></i>
                        <span>Posts</span>
                    </router-link>
                </li>
                <li>
                    <router-link class="nav-link" :to="{name : 'admin.post.lists'}" exact="true">
                        <i :class="`fas fa-book`"></i>
                        <span>Posts Lists</span>
                    </router-link>
                </li>
                <dropdown-sidebar icon="columns" title="Layout">
                    <dropdown-menu
                        path="/layout/default"
                        title="Default Layout"
                    />
                </dropdown-sidebar>
                <!-- end of layout -->
            </ul>
        </aside>
    </div>
</template>

<script>
import MenuSidebar from "./MenuSidebar.vue";
import TitleMenuSidebar from "./TitleMenuSidebar.vue";
import DropdownSidebar from "./DropdownSidebar.vue";
import DropdownMenu from "./DropdownMenu.vue";

export default {
    name: "SideBar",
    components: {
        MenuSidebar,
        TitleMenuSidebar,
        DropdownMenu,
        DropdownSidebar,
    },
};
</script>
