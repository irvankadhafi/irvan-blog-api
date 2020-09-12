<template>
    <div>
        <div class="jumbotron jumbotron-fluid text-light">
            <div class="container">
                <h1 class="display-4">Selamat datang di Nuthink News!</h1>
                <p class="lead">
                    Halaman ini berisi artikel, berita, dan informasi seputar <strong>Politeknik Negeri Bandung</strong>
                </p>
                <hr class="my-4 bg-light">
            </div>
            <div id="irvanpost"></div>
        </div>
        <div class="main-wrapper container">
            <div class="main-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <transition-group name="fade" tag="div" class="row">
                                <div class="col-md-6" v-for="(post,index) in posts.data" :key="post.slug">
                                    <div class="post">
                                        <a class="post-img" href="http://nuthink.jtk.polban.ac.id/isi-post/peer-counselor">
                                            <img :src="'/uploads/posts/'+post.image" alt="" style="height: 200px">
                                        </a>
                                        <div class="post-body">
                                            <div class="post-category">
                                                <a href="#">{{post.category}}</a>
                                            </div>
                                            <h3 class="post-title"><router-link :to="{name:'posts.detail', params: {postSlug : post.slug}}">{{post.title}}</router-link></h3>
                                            <ul class="post-meta">
                                                <li>{{post.author}}</li>
                                                <li>{{post.published}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </transition-group>
<!--                            <div class="row">-->
<!--                            </div>-->
<!--                            Paginate-->
                            <pagination :data="posts" @pagination-change-page="getPosts"></pagination>

                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header" style="text-align: center">
                                    <h4 class="m-auto text-dark">Search</h4>
                                </div>
                                <div class="card-body">

                                    <form action="http://nuthink.jtk.polban.ac.id/cari" method="get">
                                        <input class="input" name="cari" placeholder="Enter your search...">
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" style="text-align: center">
                                    <h4 class="m-auto text-dark">Categories</h4>
                                </div>
                                <div class="card-body">
                                    <div class="list-group">
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/uncategorized" class="list-group-item list-group-item-action">Uncategorized</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/manajemen" class="list-group-item list-group-item-action">Manajemen</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/informasi-kp" class="list-group-item list-group-item-action">Informasi KP</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/pendidikan" class="list-group-item list-group-item-action">Pendidikan</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/kesehatan" class="list-group-item list-group-item-action">Kesehatan</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/donor-darah" class="list-group-item list-group-item-action">Donor Darah</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/hari-peringatan" class="list-group-item list-group-item-action">Hari Peringatan</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/psikologi" class="list-group-item list-group-item-action">Psikologi</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/bisnis" class="list-group-item list-group-item-action">Bisnis</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import pagination from 'laravel-vue-pagination';
require('vue2-animate/dist/vue2-animate.min.css')
export default {
    name: "News",
    components :{
        pagination,
        transitionName: 'fade'
    },
    data(){
        return{
            posts: {}
        }
    },
    mounted(){
        this.getPosts()

    },
    methods:{
        async getPosts(page=1){
            let response = await axios.get('/posts?page='+page)
            console.log(response.data)
            this.posts = response.data;
        }
    }
}
</script>

<style scoped>
.jumbotron {
    background-image: url('/img/polban2.jpg');
    background-size: cover;
    background-position: center;
}
</style>
