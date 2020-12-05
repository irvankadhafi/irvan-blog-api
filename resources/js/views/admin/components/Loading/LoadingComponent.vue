<template>
    <div class="container-fluid h-100 pt-4">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="loader"></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "LoadingComponent",
};
</script>

<style scoped>
.container-fluid.h-100.pt-4 {
    position: fixed;
    width: 100%;
    height: 100%;
}
</style>
