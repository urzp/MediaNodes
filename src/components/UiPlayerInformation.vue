<template>
<div class="title">
    <div class="text">Плеер: {{ player.name }}, {{ player.city }}, {{ player.address }}</div>
    <div class="edit">
        <div class="editButton"><img src="@/assets/icons/pen.svg" alt="pen"></div>
        <RouterLink to="/players" class="label">Редактировать плеер</RouterLink>
    </div>
</div>
<div class="inf">
    <div class="net-status" style="width: 150px;" :class="{'online':player.online}">{{ player.online?'ONLINE':player.last_online.toLocaleString() }}</div>
    <div class="active-track" style="width: 100%;">
        <div v-if="player.plaing" class="playstatus"><img src="@/assets/icons/play.gif" alt=""></div>
        <div class="label">{{ player.act_track }}</div>
    </div>
    <div class="playPanel" style="width: 220px;">
        <UiPlayPuseButton :play="player.plaing"/>
        <UiVolume :value="player.volme + '%'"/>            
    </div>
    <div class="ip" style="width: 220px;">IP: {{ player.ip }}</div>
    <div class="updated" style="width: 220px;">Обновлен:<br> {{ player.updated.toLocaleString() }}</div>
</div>
</template>


<script>
import UiPlayPuseButton from '@/components/UiPlayPuseButton.vue'
import UiVolume from '@/components/UiVolume.vue'

export default {
    name: 'UiPlayerInf',
    props: {
        player: Object,
    },
    components: { 
        UiPlayPuseButton,
        UiVolume,
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

.inf > .online{
    background-color: #449C4A;
    }
    .inf  .active-track{
    display: flex;
    justify-content: flex-start;
    font-size: 14px; 
    color: #D2D2D2;
    }

    .playstatus{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 70px;
    height: 100%;
    background-color: #F09EC8;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    }

    .playstatus img{
    width: 32px;
    height: 32px;
    }

    .inf .label{
    margin-left: 30px;
    }

    .inf .playPanel{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding: 0 10px;
}

</style>