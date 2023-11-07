<template>
    <div class="left-bar">
        <RouterLink to="/" class="logo"><img src="../assets/icons/Logo.png" alt="logo"></RouterLink>
        <div class="menu-list">
            <UiMenuItem text="Главная" @click="$router.push('/')" :selected="selectedItem.home"><img src="../assets/icons/home.svg" alt="home"></UiMenuItem>
            <UiMenuItem text="Профиль" :selected="selectedItem.user" @click="$router.push('/user')"><img src="../assets/icons/user.svg" alt="user"></UiMenuItem>
            <UiMenuItem text="Плееры" :selected="selectedItem.players" @click="$router.push('/players')"><img src="../assets/icons/pleer.svg" alt="user"></UiMenuItem>
            <UiMenuItem text="Пользователи" v-if="user.level=='admin'" :selected="selectedItem.users" @click="$router.push('/users')" ><img src="../assets/icons/group.svg" alt="users" ></UiMenuItem>
            <UiMenuItem text="Техподержка" @click="$router.push('/support-user')" :selected="selectedItem.support"><img src="../assets/icons/support.svg" alt="home"></UiMenuItem>
            <UiMenuItem text="Выйти" @click="logout()" :selected="selectedItem.out"><img src="../assets/icons/logout.svg" alt="home"></UiMenuItem>
        </div>
    </div>
</template>

<script>
import UiMenuItem from '@/components/UiMenuItem.vue'

export default {
  name: 'UiLeftBar',
  data(){
    return{
        user:JSON.parse(sessionStorage.getItem('user')),
    }
  },
  components: {
    UiMenuItem,
  },
  props:{
        selcted: String,
    },
    computed:{
        selectedItem(){
            let out ={
                home: false,
                user: false,
                support: false,
                players: false,
                out:false
            }
            out[this.selcted] = true
            return out
        }
    },
    methods:{
        logout(){
            sessionStorage.clear();
            this.$router.push('/login')
        }
    }
}

</script>

<style scoped>
    .left-bar{
        position: fixed;
        width: 270px;
        height: 100vh;
        background-color: #2F2F2F;
        top: 0;
        left: 0;
        z-index: 10;
    }

    .left-bar .logo{
        display: block;
        margin-top: 20px;
        margin-left: 40px;
        text-align: left;
    }
    .menu-list{
        margin-top: 40px;
    }
</style>