<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <button class="btn btn-success" @click.prevent="add()">
                            Add
                        </button>
                    </h4>
                    <div class="card-header-form">
                        <form>
                            <div class="input-group">
                                <search-table-component
                                    @searchkeyword="search"
                                />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th class="text-center">#</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Qty</th>
                                <th>Photo</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                            <tr>
                                <td
                                    colspan="6"
                                    class="text-center"
                                    v-if="data.length === 0"
                                >
                                    data not found
                                </td>
                            </tr>
                            <tr v-for="(value, index) in data" :key="index">
                                <td class="p-0 text-center">
                                    {{ (current - 1) * 5 + index + 1 }}
                                </td>
                                <td>{{ value.Title }}</td>
                                <td>
                                    {{ value.Author }}
                                </td>
                                <td>
                                    {{ value.Qty }}
                                </td>
                                <td>
                                    {{ value.Path }}
                                </td>
                                <td class="text-center">
                                    <button
                                        class="btn btn-info mr-1"
                                        @click.prevent="detail(value.Id)"
                                    >
                                        Detail
                                    </button>
                                    <button
                                        class="btn btn-danger ml-1"
                                        @click.prevent="deleteData(value.Id)"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <pagination-component
                            @pagingdata="onPaging"
                            :total="size"
                            :currentPage="current"
                            :totalPages="Math.ceil(size / 5)"
                        />
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import PaginationComponent from "../Pagination/PaginationComponent.vue";
import SearchTableComponent from "../Search/SearchTableComponent.vue";

export default {
    name: "BookTable",
    components: {
        PaginationComponent,
        SearchTableComponent,
    },
    methods: {
        PaginationComponentadd() {
            window.router.push("book/0");
        },
        activePaging(currentPage) {
            return this.current === currentPage ? "active" : "";
        },
        onPaging(args) {
            this.$emit("paging", args);
        },
        search(data) {
            this.$emit("keyword", data);
        },
    },
    props: {
        data: {
            type: [],
        },
        detail: {
            type: Function,
        },
        deleteData: {
            type: Function,
        },
        current: {
            type: Number,
        },
        size: {
            type: Number,
        },
    },
};
</script>
