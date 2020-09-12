<template>
    <div class="container">
        edit
    </div>
</template>

<script>
    export default {
        name: "Edit",
        mounted() {
            console.log(this.$route.params.postSlug)
        }
    }
</script>
