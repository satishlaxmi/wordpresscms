import { createApp } from 'vue';
import VueQuillEditor from 'vue-quill-editor';
import { createRouter, createWebHistory } from 'vue-router';
import App from './components/App.vue';
import { routes } from './routes';

const app = createApp(App);

app.use(createRouter({
  history: createWebHistory(),
  routes: routes
}));

app.mount('#app');
