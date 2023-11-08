<template>
    <header>
        <div class="search">
            <img src="@/assets/icons/search.svg" alt="search">
            <input type="text" placeholder="Поиск плеера">
        </div>
        <div class="avatar">
            <div class="userName">{{ user.name }}</div>
            <div class="avatar_img"><img :src="url_avatar" alt="avatar"></div>
        </div>
    </header>
</template>

<script>

import { EventBus } from '@/servis/EventBus'

export default {
name: 'UiHeader',
    mounted(){
        EventBus.on('user:update', this.setUser)
    },
    data(){
        return {
            user: JSON.parse(sessionStorage.getItem('user'))
        }
    },
    methods:{
        setUser(){
            this.user = { ...JSON.parse(sessionStorage.getItem('user')) }
        }
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
    .search{
        width: 65%;
        max-width: 750px;
        display: flex;
        align-items: center;   
    }
    .search img{
        position: relative;
        left: 45px;
        top: 2px;
    }
    input{
        width: 100%;
        height: 45px;
        border-radius: 25px;
        background-color: transparent;
        border: 1px solid #B8B8B8;
        color: #B8B8B8;
        font-family: 'Intro-Book';
        font-size: 15px;
        padding-left: 65px;

    }
    .userName{
        font-family: 'Intro-Book';
        font-size: 15px;
        color:#fff;
        margin-right: 15px;
    }
    .avatar{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-end;
        margin-right: 40px;
        margin-left: 40px;
    }

    .avatar img{
        height: 45px;
    }
</style>