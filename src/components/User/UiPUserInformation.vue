<template>
<div class="title">
    <div class="text">Пользователь</div>
    <div class="edit">
        <RouterLink :to="`/players/edit/${user.id}`" class="editButton"><img src="@/assets/icons/pen.svg" alt="pen"></RouterLink>
        <RouterLink :to="`/players/edit/${user.id}`" class="label">Редактировать пользователя</RouterLink>
    </div>
</div>
<div class="inf">
    <div class="icon" style="min-width: 80px;"><img :src="url_avatars" alt=""></div>
    <div class="name" style="width: 100%;"><div class="text">{{ user.name }}</div></div>
    <div class="email" style="min-width: 300px;"><div class="text">{{ user.email }}</div></div>
    <div class="tel" style="min-width: 200px;"><div class="text">{{ user.tel }}</div></div>
    <div class="level" style="min-width: 150px;"><div class="text">{{ user.level}}</div></div>
</div>
</template>


<script>
import { computed } from 'vue'


export default {
    name: 'UiPUserInf',
    props: {
        user: [Object, String],
    },
    components: { 

    },
    computed:{
        url_avatars(){
            let url = window.baseUrl + 'img/default/avatar.svg'
            if(this.user.img) url = window.baseUrl + `img/user_${this.user.id}/${this.user.img}`
            return url
        }
    }
}
</script>


<style scoped>
.back, .edit{
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.edit{
        position: absolute;
        right: 15px;
}
.back .label{
    text-decoration: none;
    color: #ffffffc5;
    font-family: 'Intro-Book';
    font-size: 12px;
    margin-left: 10px;
    text-transform: uppercase ;
}

.edit .label{
    color: #ffffff87;
    font-family: 'Intro-Book';
    font-size: 14px;
    margin-left: 10px;
}
.backButton, .editButton{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    background-color: #2F2F2F;
    border-radius: 20px;
}
.editButton{
    background-color: #434343;
}

.title{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 60px;
    background-color: #2F2F2F;
    border-radius: 5px;
    margin-top: 25px;
}
.title .text{
    font-family: 'Intro-Bold-Alt';
    font-size: 20px;      
    color: #fff;
    
}

.title .edit{
    width: 240px;
}

.inf{
    display: flex;
    flex-direction: row;
    width: 100%;
    height: 60px;
    margin-top: 25px;
}
.inf>div{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 60px;
    width: 200px;
    background-color: #2F2F2F;  
    border-radius: 5px;    
    margin-right: 3px;
    font-family: 'Intro-Book';
    font-size: 12px;  
    color: #fff;
}
.inf .name{
    justify-content: left;
    padding-left: 30px;
    font-family: 'Intro-Bold-Alt';
    font-size: 20px;    
}

.icon img{
    max-width: 70px;
}

</style>