<template>
    <div class="left-bar" :class="{'open':open}">
        <RouterLink to="/" class="logo"><img src="../assets/icons/Logo.svg" alt="logo"></RouterLink>
        <UiButtonBack  backgroundColor="#474747" class="buton_close" @click="open=false"/>
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
import UiButtonBack from '@/components/UiComponents/UiButtonBack.vue'
import { EventBus } from '@/servis/EventBus'

export default {
  name: 'UiLeftBar',
  mounted(){
        EventBus.on('menu:openclose', ()=>{this.open = !this.open})
    },
  data(){
    return{
        user:JSON.parse(sessionStorage.getItem('user')),
        open: false,
    }
  },
  components: {
    UiMenuItem,
    UiButtonBack,
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

    .logo img{
        width: 50px;
    }

    .left-bar .logo{
        display: block;
        margin-top: 20px;
        margin-left: 40px;
        text-align: left;
    }
    .buton_close{
        display: none;
        position: absolute;
        right: 20px;
        top: 30px;
    }
    .menu-list{
        margin-top: 40px;
    }
    @media (max-width: 900px) {
        .buton_close{
            display: block;
        }

        .left-bar{
            transform: translate(-270px,0);
            transition: all 0.5s ease-in-out;
        }
        .left-bar.open{
            transform: translate(0px,0);
            transition: all 0.5s ease-in-out;
        }
    }

</style>