<template>
    <li>
        <router-link class="nav-link" :to="path" exact="true">
            <i :class="`fas fa-${icon}`"></i>
            <span>{{ menuName }}</span>
        </router-link>
    </li>
</template>

<script>
export default {
    name: "MenuSidebar",
    props: {
        path: {
            type: String,
            required: true,
        },
        icon: {
            type: String,
            required: true,
        },
        menuName: {
            type: String,
            required: true,
        },
    },
};
</script>
