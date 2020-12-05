<template>
    <div id="irvan">
        <navigation></navigation>
        <div>
            <transition name="page" mode="out-in">
                <router-view :key="$route.fullPath" />
            </transition>
        </div>
    </div>
</template>

<script>
export default {
}
</script>
