<template>
    <div>
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                        class="fas fa-bars"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="/admin/img/avatar/avatar-1.png"
                         class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">Hi, {{user.name}}</div>
                </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title">Logged in 5 min ago</div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item has-icon text-danger" href="#" @click.prevent="signOut">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</template>
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
                location.href = 'http://github.com'
                // this.$router.push({
                //     name:'home'
                // })
            })
        }
    },
    mounted() {
        this.$store.dispatch('loadInfo')
    }
}
</script>

