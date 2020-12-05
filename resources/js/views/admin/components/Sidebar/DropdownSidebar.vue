<template>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"
            ><i :class="`fas fa-${icon}`"></i> <span>{{ title }}</span></a
        >
        <ul class="dropdown-menu">
            <slot />
        </ul>
    </li>
</template>

<script>
export default {
    name: "DropdownSidebar",
    props: {
        title: {
            type: String,
            required: true,
        },
        icon: {
            type: String,
            required: true,
        },
    },
};
</script>
