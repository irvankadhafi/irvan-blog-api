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
                                <div class="col-md-6" v-for="post in posts.data" :key="post.slug">
                                    <div class="post">
                                        <router-link :to="{name:'posts.detail', params: {postSlug : post.slug}}" class="post-img">
                                            <img :src="'/uploads/posts/'+post.image" alt="" style="height: 200px">
                                        </router-link>
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

                            <PostCategories></PostCategories>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import pagination from 'laravel-vue-pagination';
import PostCategories from '../components/Categories'
require('vue2-animate/dist/vue2-animate.min.css')
export default {
    name: "News",
    components :{
        pagination,
        PostCategories,
        transitionName: 'fade'
    },
    data(){
        return{
            posts: {},
            categories : {}
        }
    },
    mounted(){
        this.getPosts(),
        this.getCategories()

    },
    methods:{
        async getPosts(page=1){
            let response = await axios.get('/posts?page='+page)
            console.log(response.data)
            this.posts = response.data;
        },
        async getCategories(){
            let response = await axios.get('/categories')
            console.log(response.data)
            this.categories = response.data;
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
