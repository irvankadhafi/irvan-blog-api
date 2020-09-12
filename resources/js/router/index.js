import Home from "../views/Home";
import About from "../views/About";
import NewPost from "../views/posts/Create";
import News from "../views/News";
import TableofPosts from '../views/posts/Table';
import Register from '../views/auth/Register';
import Login from '../views/auth/Login';
import DetailPost from '../views/posts/Show';
import store from '../store';
import EditPost from '../views/posts/Edit';
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
            path : '/news',
            name : 'pages.news',
            component : News
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
        },
        {
            path: '/posts/table',
            name: 'posts.table',
            component: TableofPosts,
            beforeEnter : requireAuth
        },
        {
            path: '/posts/:postSlug',
            name: 'posts.detail',
            component: DetailPost
        },
        {
            path: '/posts/:postSlug/edit',
            name: 'posts.edit',
            component: EditPost
        }

    ],
    scrollBehavior() {
        window.scrollTo({top: 0, behavior: 'smooth'});
        // document.getElementById('irvan').scrollIntoView({top: 0, behavior: 'smooth'});
    }
}
