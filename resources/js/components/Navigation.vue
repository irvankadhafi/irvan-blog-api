<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <router-link class="navbar-brand" exact :to="{name : 'home'}">
            <img :src="'/img/'+info.nav_img" height="35" class="d-inline-block align-top" alt="">
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <router-link class="nav-link" exact :to="{name : 'home'}">Home <span class="sr-only">(current)</span></router-link>
                </li>
                <li class="nav-item">
<!--                    <a class="nav-link" :href="'about'">Departement</a>-->
                    <router-link class="nav-link" :to="{name:'pages.about'}">Departemen</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{name:'pages.about'}">Ormawa</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{name:'pages.news'}">Polban News</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{name:'pages.about'}">Advo Care</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{name:'pages.about'}">Contact</router-link>
                </li>
                <template v-if="authenticated">
<!--                    <li class="nav-item">-->
<!--                        <router-link class="nav-link" :to="{name:'posts.create'}">New Post</router-link>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <router-link class="nav-link" :to="{name:'posts.table'}">List Posts</router-link>-->
<!--                    </li>-->
                    <li class="nav-item">
                        <span class="nav-link">Hi !{{user.name}}</span>
                    </li>
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#" @click.prevent="signOut">Logout</a>-->
<!--                    </li>-->
                </template>
<!--                <template v-else>-->
<!--                    <li class="nav-item">-->
<!--                        <router-link class="nav-link" :to="{name:'signin'}">Login</router-link>-->
<!--                    </li>-->
<!--                </template>-->
            </ul>
<!--            <form class="form-inline my-2 my-lg-0">-->
<!--                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                <button class="btn btn-success my-2 my-sm-0 bg-blue" type="submit">Search</button>-->
<!--            </form>-->
        </div>
    </nav>
</template>
<style scoped>
.navbar-yellow{
    background-color: #FFFFF;
}
</style>
<script>
import {mapGetters,mapActions,mapState} from 'vuex'
export default {
    computed : {
        ...mapGetters({
            authenticated : 'auth/authenticated',
            user   : 'auth/user'
        }),
        ...mapState([
            'info'
        ])
    },
    methods:{
        ...mapActions({
            signOutAction : 'auth/signOut'
        }),
        signOut(){
            this.signOutAction().then(()=>{
                this.$toasted.show('Anda Telah Logout',{
                    type: 'success',
                    duration: 3000,
                })
                this.$router.replace({
                    name:'home'
                })
            })
        }
    },
    mounted() {
        this.$store.dispatch('loadInfo')
    },
    watch: {
        '$route' () {
            $('#navbarSupportedContent').collapse('hide');
        }
    }
}
</script>

