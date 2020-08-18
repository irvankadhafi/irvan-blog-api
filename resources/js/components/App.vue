<template>
    <div id="irvan">
        <navigation></navigation>
        <div class="mt-4">
            <transition name="page" mode="out-in">
                <router-view />
            </transition>
        </div>
    </div>
</template>

<script>
export default {
}
</script>
