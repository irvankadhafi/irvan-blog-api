<template>
    <div class="projects">
        <div class="tableFilters">
            <div class="row">
                <div class="col-md-5 mt-5">
                    <input class="input" type="text" v-model="tableData.search" placeholder="Cari Postingan"
                           @input="getPosts()">
                    <div class="control">
                        <div class="select">
                            <select v-model="tableData.length" @change="getPosts()">
                                <option v-for="(records, index) in perPage" :key="index" :value="records">{{records}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                </div>
        </div>
        <section class="section">
            <title-header title="List Post" />
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <div class="card">
                            <div class="card-header">List Post</div>
                            <div class="card-body">
        <datatable :columns="columns" :sortKey="sortKey" :sortOrders="sortOrders" @sort="sortBy">
            <tbody>
            <tr v-for="post in posts" :key="post.slug">
                <td>
<!--                    <router-link :to="{name:'posts.detail', params: {postSlug : post.slug}}">{{ post.title }}-->
<!--                    </router-link>-->
                    {{post.title}}
                </td>
<!--                <td>{{post.title}}</td>-->
                <td>{{post.category.name}}</td>
                <td>{{post.user.name}}</td>
                <td>
                    <router-link :to="{name:'posts.edit', params: {postSlug : post.slug}}" class="btn btn-success">
                        Edit
                    </router-link>
                </td>
            </tr>
            </tbody>
        </datatable>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            <pagination :pagination="pagination"
                        @prev="getPosts(pagination.prevPageUrl)"
                        @next="getPosts(pagination.nextPageUrl)">
            </pagination>
    </div>
</template>

<script>
import DataTable from "../../../../components/DataTable";
import Pagination from "../../../../components/Pagination";

export default {
    components: { datatable: DataTable, pagination: Pagination},
    created() {
        this.getPosts();
    },
    data() {
        let sortOrders = {};
        let columns = [
            {width: '50%', label: 'Title', name: 'title' },
            {width: '25%', label: 'Category', name: 'category_id'},
            {width: '25%', label: 'Author', name: 'user_id'}
        ];
        columns.forEach((column) => {
            sortOrders[column.name] = -1;
        });
        return {
            url: '/search/posts',
            posts: {},
            columns: columns,
            sortKey: 'title',
            sortOrders: sortOrders,
            perPage: ['10', '20', '30'],
            tableData: {
                draw: 0,
                length: 10,
                search: '',
                column: 0,
                dir: 'desc',
            },
            pagination: {
                lastPage: '',
                currentPage: '',
                total: '',
                lastPageUrl: '',
                nextPageUrl: '',
                prevPageUrl: '',
                from: '',
                to: ''
            },
        }
    },
    methods: {
        async getPosts(url = this.url) {
            this.tableData.draw++;
            await axios.get(url, {params: this.tableData})
                .then(response => {
                    let data = response.data;
                    if (this.tableData.draw == data.draw) {
                        this.posts = data.data.data;
                        console.log("cek response"+response.data)
                        this.configPagination(data.data);
                    }
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        configPagination(data) {
            this.pagination.lastPage = data.last_page;
            this.pagination.currentPage = data.current_page;
            this.pagination.total = data.total;
            this.pagination.lastPageUrl = data.last_page_url;
            this.pagination.nextPageUrl = data.next_page_url;
            this.pagination.prevPageUrl = data.prev_page_url;
            this.pagination.from = data.from;
            this.pagination.to = data.to;
        },
        sortBy(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
            this.tableData.column = this.getIndex(this.columns, 'name', key);
            this.tableData.dir = this.sortOrders[key] === 1 ? 'asc' : 'desc';
            this.getPosts();
        },
        getIndex(array, key, value) {
            return array.findIndex(i => i[key] == value)
        },
    }
};
</script>
