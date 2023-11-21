<template>
    <header>
        <RouterLink to="/" class="logo"><img src="../assets/icons/Logo.svg" alt="logo"></RouterLink>
        <UiSearch  :show="{w_size: 800, more:true}"/>
        <div class="menu" @click="open_closeMenu"><img src="@/assets/icons/gamburger.svg" alt=""></div>
        <div class="avatar" @click="$router.push('/user')">
            <div class="userName">{{ user.name }}</div>
            <div class="avatar_img"><img :src="url_avatar" alt="avatar"></div>
        </div>
    </header>
</template>

<script>

import { EventBus } from '@/servis/EventBus'
import UiSearch from '@/components/UiSearch.vue'

export default {
name: 'UiHeader',
    mounted(){
        EventBus.on('user:update', this.setUser)
    },
    data(){
        return {
            user: JSON.parse(sessionStorage.getItem('user')),
            showSeach: false,
        }
    },
    components:{
        UiSearch,
    },
    methods:{
        setUser(){
            this.user = { ...JSON.parse(sessionStorage.getItem('user')) }
        },
        gotoPlayers(){
            this.$router.push('/players')
        },
        open_closeMenu(){
            EventBus.emit('menu:openclose');
        },
    },
    computed:{
        url_avatar(){
            let url = window.baseUrl + 'img/default/avatar.svg'
            if(this.user.img) url = window.baseUrl + `img/user_${this.user.id}/${this.user.img}`
            return url;
        }
    }
}
</script>

<style scoped>
    header{
        margin-left: 305px;
        position: fixed;
        width: calc(100% - 305px);
        height: 80px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        background-color: #1F1F1F;
        z-index: 5;
    }
    .logo{
        display: none;
        
    }
    .logo img{
        width: 50px;
    }
    
    .userName{
        font-family: 'Intro-Book';
        font-size: 15px;
        color:#fff;
        margin-right: 15px;
    }
    .menu{
        display: none;
    }
    .avatar{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-end;
        margin-right: 20px;
        margin-left: 40px;
        cursor: pointer;
    }

    .avatar img{
        height: 45px;
    }

    @media (max-width: 900px) { 
        header{
            width: 100% ;
            margin-left: 0px;          
        }

        .logo{
            display: block;
            margin-top: 20px;
            margin-left: 40px;
            text-align: left;
        }

        .menu{
            display: block;
        }
        .avatar{
            margin-left: 10px;
        }
    } 


    @media (max-width: 650px) {
        .userName{
            display: none;
        }

        .logo{
            margin-left: 20px;
        }
        .avatar{
            margin-right: 20px;
        }
    }
</style>