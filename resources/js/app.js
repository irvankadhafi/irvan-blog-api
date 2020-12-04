import './bootstrap'
import Vue from 'vue';
import App from './components/App'
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import Toasted from 'vue-toasted'
Vue.use(Toasted)
import store from './store'
require('./store/subscriber')
Vue.component('navigation', require('./components/Navigation.vue').default);
Vue.component('createposts', require('./views/posts/Create.vue').default);
import routes from './router'
Vue.config.productionTip = false;
axios.defaults.baseURL='/api'
store.dispatch('auth/attempt',localStorage.getItem('token')).then(()=>{
    const app = new Vue({
        el: '#irvan',
        components : {App},
        router : new VueRouter(routes),
        store : store,
    });
})
