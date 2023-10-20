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

const routes = [
  {
    path: '/',
    name: 'home',
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
    component: PageSupportUser,
  },
  {
    path: '/players',
    name: 'players',
    component: PagePlayers,
  },
  {
    path: '/players/:playerId([0-9]+)',
    name: 'player',
    component: PagePlayer,
  },
  {
    path: '/players/edit/:playerId([0-9]+)',
    name: 'editPlayer',
    component: PageEditPlayer,
  }

  
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
