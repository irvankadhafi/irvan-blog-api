<template>
<!--    <div class="d-flex justify-content-center">-->
        <nav class="pagination" v-if="!client">
            <span class="page-stats">{{pagination.from}} - {{pagination.to}} of {{pagination.total}}</span>
            <button type="button" class="btn btn-primary" v-if="pagination.prevPageUrl"  @click="$emit('prev');">
                Prev
            </button>
            <button type="button" class="btn btn-primary" v-else :disabled="true">
                Prev
            </button>

            <button type="button" class="btn btn-primary" v-if="pagination.nextPageUrl" @click="$emit('next');">
                Next
            </button>
            <button type="button" class="btn btn-primary" v-else :disabled="true">
                Next
            </button>
        </nav>

        <nav class="pagination" v-else>
        <span class="page-stats">
            {{pagination.from}} - {{pagination.to}} of {{filtered.length}}
            <span v-if="filtered.length < pagination.total">(filtered from {{pagination.total}} total entries)</span>
        </span>
            <button type="button" class="btn btn-primary" v-if="pagination.prevPage" @click="$emit('prev');">
                Prev
            </button>
            <button type="button" class="btn btn-primary" v-else :disabled="true">
                Prev
            </button>

            <button type="button" class="btn btn-primary" v-if="pagination.nextPage" @click="$emit('next');">
                Next
            </button>
            <button type="button" class="btn btn-primary" v-else :disabled="true">
                Next
            </button>
        </nav>
<!--    </div>-->
</template>

<script>
export default {
    props: ['pagination', 'client', 'filtered']
}
</script>

<style lang="scss">
.pagination {
    justify-content: flex-end !important;
    .page-stats {
        align-items: center;
        margin-right: 5px;
    }
    i {
        color: #3273dc !important;
    }
}
</style>
