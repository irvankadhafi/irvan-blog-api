import Home from "../views/Home";
import About from "../views/About";
import NewPost from "../views/posts/Create";
import Register from '../views/auth/Register';
import Login from '../views/auth/Login';
import store from '../store'
function requireAuth(to,from,next) {
    if(!store.getters['auth/authenticated']){
        return next({
            name : 'signin'
        })
    }
    next()
}
export default {
    mode:'history',
    linkActiveClass:'active',

    routes : [
        {
            path : '/',
            name : 'home',
            component : Home
        },
        {
            path : '/about',
            name : 'pages.about',
            component : About
        },
        {
            path : '/posts/create',
            name : 'posts.create',
            component : NewPost,
            beforeEnter : requireAuth
        },
        {
            path: '/register',
            name: 'auth.register',
            component: Register,
        },{
            path: '/login',
            name: 'signin',
            component: Login
        }
    ]
}
