import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import App from './App.vue'
import Home from '@/Page/Home.vue'
import ClientList from '@/Page/ClientList.vue'
import ClientNewCreate from '@/Page/ClientNewCreate.vue'

const routes = [
  {path: '/', name: 'Home', component: Home},
  {path: '/clients_list', name: 'ClientList', component: ClientList},
  {path: '/clients_new', name: 'About', component: ClientNewCreate}
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

createApp(App).use(router).mount("#app")

export default router;