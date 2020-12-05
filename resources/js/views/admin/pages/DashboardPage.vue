<template>
    <div>
        <loading-component v-show="isLoading" />
        <div v-show="!isLoading">
            <title-header title="Dashboard" />
            <div class="row">
                <div class="col-md-12">
                    <div class="hero bg-primary text-white">
                        <div class="hero-inner">
                            <h2>Selamat Datang, {{user.name}}</h2>
                            <p class="lead">Aplikasi Nuthink</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TitleHeader from "../components/Title/TitleHeader.vue";
import LoadingComponent from "../components/Loading/LoadingComponent.vue";
import {mapGetters,mapActions,mapState} from 'vuex'
export default {
    name: "DashboardPage",
    computed : {
        ...mapGetters({
            authenticated : 'auth/authenticated',
            user   : 'auth/user'
        }),
        ...mapState([
            'info'
        ])
    },
    data: function() {
        return {
            isLoading: true,
        };
    },
    components: {
        TitleHeader,
        LoadingComponent,
    },
    mounted: function() {
        const vm = this;
        setTimeout(function() {
            vm.isLoading = false;
        }, 100);
    },
};
</script>
