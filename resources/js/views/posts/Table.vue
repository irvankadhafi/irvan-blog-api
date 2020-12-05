<template>
    <div class="container ">
        <h3>Table of Posts</h3>
        <hr>
<!--        <table class="table">-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <td>Judul</td>-->
<!--                <td>Kategori</td>-->
<!--                <td>Penulis</td>-->
<!--                <td>Aksi</td>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--            <tr v-for="(post,index) in posts.data" :key="post.slug">-->
<!--                <td><router-link :to="{name:'posts.detail', params: {postSlug : post.slug}}">{{post.title}}</router-link></td>-->
<!--                <td>{{post.category}}</td>-->
<!--                <td>{{post.author}}</td>-->
<!--                <td><router-link :to="{name:'posts.edit', params: {postSlug : post.slug}}" class="btn btn-success">Edit</router-link></td>-->
<!--            </tr>-->
<!--            </tbody>-->
<!--        </table>-->
        <app-datatable
            :items="items"
            :fields="fields"
            :meta="meta"
            @per_page="handlePerPage"
            @pagination="handlePagination"
            @search="handleSearch"
            @sort="handleSort"
        />
    </div>
</template>

<script>
import Datatable from '../../components/DataTable'
export default {
    name: "Table",
    created() {
        this.loadPostsData()
    },
    components: {
        'app-datatable': Datatable
    },
    data() {
        return {
            //UNTUK VARIABLE FIELDS, DEFINISIKAN KEY UNTUK MASING-MASING DATA DAN SORTABLE BERNILAI TRUE JIKA INGIN MENAKTIFKAN FITUR SORTING DAN FALSE JIKA TIDAK INGIN MENGAKTIFKAN
            fields: [
                {key: 'title', sortable: true},
            ],
            items: [], //DEFAULT VALUE DARI ITEMS ADALAH KOSONG
            meta: [], //JUGA BERLAKU UNTUK META
            current_page: 1, //DEFAULT PAGE YANG AKTIF ADA PAGE 1
            per_page: 10, //DEFAULT LOAD PERPAGE ADALAH 10
            search: '',
            sortBy: 'created_at', //DEFAULT SORTNYA ADALAH CREATED_AT
            sortByDesc: false //ASCEDING
        }
    },
    methods: {
        //METHOD INI AKAN MENGHANDLE REQUEST DATA KE API
        loadPostsData() {
            let current_page = this.search == '' ? this.current_page:1
            //LAKUKAN REQUEST KE API UNTUK MENGAMBIL DATA POSTINGAN
            axios.get(`/posts`, {
                //KIRIMKAN PARAMETER BERUPA PAGE YANG SEDANG DILOAD, PENCARIAN, LOAD PERPAGE DAN SORTING.
                params: {
                    page: current_page,
                    per_page: this.per_page,
                    q: this.search,
                    sortby: this.sortBy,
                    sortbydesc: this.sortByDesc ? 'DESC':'ASC'
                }
            })
                .then((response) => {
                    console.log(response.data.data)
                    //JIKA RESPONSENYA DITERIMA
                    let getData = response.data
                    this.items = getData.items //MAKA ASSIGN DATA POSTINGAN KE DALAM VARIABLE ITEMS
                    //DAN ASSIGN INFORMASI LAINNYA KE DALAM VARIABLE META
                    this.meta = {
                        total: getData.total,
                        current_page: getData.current_page,
                        per_page: getData.per_page,
                        from: getData.from,
                        to: getData.to
                    }
                })
        },
        //JIKA ADA EMIT TERKAIT LOAD PERPAGE, MAKA FUNGSI INI AKAN DIJALANKAN
        handlePerPage(val) {
            this.per_page = val //SET PER_PAGE DENGAN VALUE YANG DIKIRIM DARI EMIT
            this.loadPostsData() //DAN REQUEST DATA BARU KE SERVER
        },
        //JIKA ADA EMIT PAGINATION YANG DIKIRIM, MAKA FUNGSI INI AKAN DIEKSEKUSI
        handlePagination(val) {
            this.current_page = val //SET CURRENT PAGE YANG AKTIF
            this.loadPostsData()
        },
        //JIKA ADA DATA PENCARIAN
        handleSearch(val) {
            this.search = val //SET VALUE PENCARIAN KE VARIABLE SEARCH
            this.loadPostsData() //REQUEST DATA BARU
        },
        //JIKA ADA EMIT SORT
        handleSort(val) {
            //MAKA SET SORT-NYA
            this.sortBy = val.sortBy
            this.sortByDesc = val.sortDesc

            this.loadPostsData() //DAN LOAD DATA BARU BERDASARKAN SORT
        }
    }
    // data(){
    //     return{
    //         posts:[]
    //     }
    // },
    // mounted(){
    //     this.getPosts()
    //
    // },
    // methods:{
    //     async getPosts(){
    //         let response = await axios.get('/posts')
    //         console.log(response.data)
    //         this.posts = response.data;
    //     }
    // }
}
</script>
