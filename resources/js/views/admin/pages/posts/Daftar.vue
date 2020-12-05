<template>
<div>
    <loading-component v-show="isLoading" />
    <div v-show="!isLoading">
        <title-header title="Lists Post" />
        <table class="table">
            <thead>
            <tr>
                <td>Judul</td>
                <td>Kategori</td>
                <td>Penulis</td>
                <td>Aksi</td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(post,index) in posts.data" :key="post.slug">
                <td><router-link :to="{name:'posts.detail', params: {postSlug : post.slug}}">{{post.title}}</router-link></td>
                <td>{{post.category}}</td>
                <td>{{post.author}}</td>
                <td><router-link :to="{name:'posts.edit', params: {postSlug : post.slug}}" class="btn btn-success">Edit</router-link></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
import TitleHeader from "../../components/Title/TitleHeader.vue";
import LoadingComponent from "../../components/Loading/LoadingComponent.vue";
export default {
    name: "Daftar",
    components: {
        TitleHeader,
        LoadingComponent,
    },
    data(){
        return{
            posts:[]
        }
    },
    mounted(){
        this.getPosts()

    },
    methods:{
        async getPosts(){
            let response = await axios.get('/posts')
            console.log(response.data)
            this.posts = response.data;
        }
    }
}
</script>
