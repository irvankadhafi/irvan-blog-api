import './bootstrap'
import Vue from 'vue';
import App from './components/App'
import AdminApp from './components/AdminApp'
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import Toasted from 'vue-toasted'
Vue.use(Toasted)
import store from './store'
require('./store/subscriber')
Vue.component('navigation', require('./components/Navigation.vue').default);
Vue.component('createposts', require('./views/posts/Create.vue').default);
Vue.component('listsposts', require('./views/posts/Table.vue').default);
Vue.component('login', require('./views/auth/Login').default);
import routes from './router'
Vue.config.productionTip = false;
axios.defaults.baseURL='/api'
store.dispatch('auth/attempt',localStorage.getItem('token')).then(()=>{
    const app = new Vue({
        el: '#irvan',
        components : {App,AdminApp},
        router : new VueRouter(routes),
        store : store,
    });
})
