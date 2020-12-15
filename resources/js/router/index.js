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
import Admin from '../views/admin/Index';
import DashboardHome from '../views/admin/pages/DashboardPage';
import AdminPosts from '../views/admin/pages/posts/Buat';
import AdminEditPosts from '../views/admin/pages/posts/Edit';
import AdminPostsLists from '../views/admin/pages/posts/Daftar';
function requireAuth(to,from,next) {
    if(!store.getters['auth/authenticated']){
        return next({
            name : 'signin'
        })
    }
    next()
}
export default {
    base: '/',
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
            name: 'register',
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
            component: AdminEditPosts,
            beforeEnter : requireAuth
        },
        {
            path:'/dashboard/',
            name:'admin.index',
            beforeEnter : requireAuth,
            component: DashboardHome,
        },
        {
            path:'/dashboard/home',
            name : 'admin.home',
            component: DashboardHome
        },
        {
            path:'/dashboard/post/create',
            name : 'admin.post.create',
            component: AdminPosts
        },
        {
            path:'/dashboard/post/lists',
            name : 'admin.post.lists',
            component: AdminPostsLists
        },

    ],
    scrollBehavior() {
        window.scrollTo({top: 0, behavior: 'smooth'});
        // document.getElementById('irvan').scrollIntoView({top: 0, behavior: 'smooth'});
    }
}
