<template>
    <ul class="pagination mb-0">
        <li :class="`page-item ${prevStatus}`">
            <button
                class="page-link"
                @click="onClickFirstPage"
                :disabled="isInFirstPage"
            >
                <i class="fas fa-angle-double-left"></i>
            </button>
        </li>

        <li :class="`page-item ${prevStatus}`">
            <button
                class="page-link"
                @click="onClickPreviousPage()"
                :disabled="isInFirstPage"
            >
                <i class="fas fa-angle-left"></i>
            </button>
        </li>

        <li
            v-for="(page, index) in pages"
            class="page-item"
            :class="{ active: isPageActive(page.name) }"
            :key="index"
        >
            <button
                @click="onClickPage(page.name)"
                :disabled="page.isDisabled"
                class="page-link"
            >
                {{ page.name }}
            </button>
        </li>

        <li :class="`page-item ${nextStatus}`">
            <button
                class="page-link"
                @click="onClickNextPage()"
                :disabled="isInLastPage"
            >
                <i class="fas fa-angle-right"></i>
            </button>
        </li>

        <li :class="`page-item ${nextStatus}`">
            <button
                class="page-link"
                @click="onClickLastPage"
                :disabled="isInLastPage"
            >
                <i class="fas fa-angle-double-right"></i>
            </button>
        </li>
    </ul>
</template>

<script>
export default {
    name: "PaginationComponent",
    props: {
        maxVisibleButtons: {
            type: Number,
            required: false,
            default: 2,
        },
        total: {
            type: Number,
            required: true,
        },
        currentPage: {
            type: Number,
            required: true,
        },
        postPerPage: {
            type: Number,
            required: false,
            default: 5,
        },
        totalPages: {
            type: Number,
            required: true,
        },
    },
    computed: {
        startPage() {
            if (this.currentPage === 1) return 1;

            if (this.currentPage === this.totalPages)
                return this.totalPages - this.maxVisibleButtons;

            return this.currentPage - 1;
        },
        pages() {
            const range = [],
                all = this.startPage + this.maxVisibleButtons,
                minimum = this.totalPages,
                limit = Math.min(all, minimum);

            for (let i = this.startPage; i <= limit; i++) {
                range.push({
                    name: i,
                    isDisabled: i === this.currentPage,
                });
            }

            return range;
        },
        isInFirstPage() {
            return this.currentPage === 1;
        },
        isInLastPage() {
            return this.currentPage === this.totalPages;
        },
        prevStatus() {
            return this.currentPage == 1 ? "disabled" : "";
        },
        nextStatus() {
            return this.currentPage == this.totalPages ? "disabled" : "";
        },
    },
    methods: {
        onClickFirstPage() {
            this.$emit("pagingdata", 1);
        },
        onClickPreviousPage() {
            this.$emit("pagingdata", this.currentPage - 1);
        },
        onClickPage(page) {
            this.$emit("pagingdata", page);
        },
        onClickNextPage() {
            this.$emit("pagingdata", this.currentPage + 1);
        },
        onClickLastPage() {
            this.$emit("pagingdata", this.totalPages);
        },
        isPageActive(page) {
            return this.currentPage == page;
        },
    },
};
</script>
