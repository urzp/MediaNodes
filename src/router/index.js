import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import PageLogin from '../views/PageLogin.vue'
import PageRegiste from '../views/PageRegiste.vue'
import PageResetPassword from '../views/PageResetPassword.vue'
import PageSupport from '../views/PageSupport.vue'
import PageSupportUser from '../views/PageSupportUser.vue'
import PagePlayers from '../views/PagePlayers'
import PagePlayer from '../views/PagePlayer'
import PageEditPlayer from '../views/PageEditPlayer'
import PageUser from '../views/PageUser'
import { isLogget } from '../servis/islogget.js';

const routes = [
  {
    path: '/',
    name: 'home',
    meta: {
      requireAuth: true,
    },
    component: HomeView
  },
  {
    path: '/login',
    name: 'login',
    component: PageLogin
  },
  {
    path: '/register',
    name: 'register',
    component: PageRegiste
  },
  {
    path: '/reset-password',
    name: 'reset-password',
    component: PageResetPassword
  },
  {
    path: '/user',
    name: 'user',
    meta: {
      requireAuth: true,
    },
    component: PageUser,
  },
  {
    path: '/support',
    name: 'support',
    component: PageSupport,
  },
  {
    path: '/support-user',
    name: 'supportUser',
    meta: {
      requireAuth: true,
    },
    component: PageSupportUser,
  },
  {
    path: '/players',
    name: 'players',
    meta: {
      requireAuth: true,
    },
    component: PagePlayers,
  },
  {
    path: '/players/:playerId([0-9]+)',
    name: 'player',
    meta: {
      requireAuth: true,
    },
    component: PagePlayer,
  },
  {
    path: '/players/edit/:playerId([0-9]+)',
    name: 'editPlayer',
    meta: {
      requireAuth: true,
    },
    component: PageEditPlayer,
  }

  
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach(async (to, from) => {
  let logget = await isLogget();
  if(!to.meta.requireAuth&&logget) return "/"
  if(to.meta.requireAuth&&!logget) return {path: '/login'}
  return true
})

export default router
