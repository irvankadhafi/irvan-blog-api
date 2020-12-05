<template>
    <li>
        <router-link class="nav-link" :to="path">{{ title }}</router-link>
    </li>
</template>

<script>
export default {
    name: "DropdownMenu",
    props: {
        path: {
            type: String,
            required: true,
        },
        title: {
            type: String,
            required: true,
        },
    },
};
</script>
