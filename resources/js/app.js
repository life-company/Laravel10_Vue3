import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import App from './App.vue'
import Home from '@/Page/Home.vue'
import About from '@/Page/About.vue'

const routes = [
  {path: '/', name: 'Home', component: Home},
  {path: '/about', name: 'About', component: About}
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

createApp(App).use(router).mount("#app")

export default router;