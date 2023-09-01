import EditPost from './components/EditPost.vue';
import AddNewPost from './components/posts/AddNewPosts.vue';
import AllPosts from './components/posts/AllPosts.vue';
import MainMedia from './components/media/MainMedia.vue';




 
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
];