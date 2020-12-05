<template>
    <div class="section-header">
        <h1>{{ title }}</h1>
    </div>
</template>

<script>
export default {
    name: "TitleHeader",
    props: {
        title: {
            type: String,
            required: true,
        },
    },
};
</script>
