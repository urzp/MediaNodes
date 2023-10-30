import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

let baseUrl = 'https://ermakpass.ru/media_node/php/';
window.baseUrl = baseUrl;

const app = createApp(App)
app.use(store)
app.use(router)
app.mount('#app')
