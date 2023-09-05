import EditPost from './components/posts/EditPost.vue';
import AddNewPost from './components/posts/AddNewPosts.vue';
import AllPosts from './components/posts/AllPosts.vue';
import MainMedia from './components/media/MainMedia.vue';
import Catogery from './components/catogery/maincatogery.vue';
import Menu from './components/menu/menu.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllPosts
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditPost
    },
    {
        name:'addnewpost',
        path:'/addnew',
        component:AddNewPost
    },
    {
        name: 'allpost',
        path: '/allpost',
        component:AllPosts
    },
    {
        name: 'mainmedia',
        path: '/media',
        component:MainMedia
    },
    {
        name: 'catogery',
        path: '/catogery',
        component:Catogery
    },
    {
        name: 'menu',
        path: '/menu',
        component:Menu
    },
];