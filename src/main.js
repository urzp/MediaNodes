import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import PrimeVue from 'primevue/config';


let baseUrl = 'https://media-nodes.ru/php/';
window.baseUrl = baseUrl;


const app = createApp(App)

app.config.globalProperties.$settings = {
    updateTime: 1000,
    recaptcha_key: '6LfXHQ0pAAAAALfX_rS71uK1PrUL7lNVLhZL0mAk'
};

app.use(store)
app.use(router)
app.use(PrimeVue);
app.mount('#app')
