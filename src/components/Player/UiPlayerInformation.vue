<template>
<div class="title">
    <div class="text">Плеер: {{ player.name }}, {{ player.city }}, {{ player.address }}</div>
    <div class="edit">
        <RouterLink :to="`/players/edit/${player.id}`" class="editButton"><img src="@/assets/icons/pen.svg" alt="pen"></RouterLink>
        <RouterLink :to="`/players/edit/${player.id}`" class="label">Редактировать плеер</RouterLink>
    </div>
</div>
<div class="inf v1">
    <div class="cell net-status" style="width: 150px;" :class="{'online':player.online}">{{ player.online?'ONLINE':player.last_online }}</div>
    <div class="cell active-track" style="width: 100%;">
        <div v-if="player.play_stop" class="playstatus"><img src="@/assets/icons/play.gif" alt=""></div>
        <div class="label">{{ player.current_trak_title }}</div>
    </div>
    <div class="cell playPanel" :class="{'unavailable':!player.online}" style="width: 220px;">
        <UiPlayPuseButton :play="player.play_stop" :id_player="player.id" :unavailable="!player.online"/>
        <UiVolume :value="player.volume" :id_player="player.id" :unavailable="!player.online"/>            
    </div>
    <div class="cell ip" style="width: 220px;">IP:<br> {{ player.ip }}</div>
    <div class="cell updated" style="width: 220px;">Обновлен:<br> {{ player.updated }}</div>
</div>
<div class="inf v2">
    <div class="inf_row">
        
        <div class="cell active-track" style="width: 100%;">
            <div v-if="player.play_stop" class="playstatus"><img src="@/assets/icons/play.gif" alt=""></div>
            <div class="label">{{ player.current_trak_title }}</div>
        </div>
    </div>
    <div class="inf_row">
        <div class="cell net-status" style="width: 150px;" :class="{'online':player.online}">{{ player.online?'ONLINE':player.last_online }}</div>
        <div class="cell playPanel" :class="{'unavailable':!player.online}" style="width: 220px;">
            <UiPlayPuseButton :play="player.play_stop" :id_player="player.id" :unavailable="!player.online"/>
            <UiVolume :value="player.volume" :id_player="player.id" :unavailable="!player.online"/>            
        </div>
        <div class="cell ip" style="width: 220px;">IP-адрес: <br> {{ player.ip }}</div>
        <div class="cell updated" style="width: 220px;">Обновлен: <br> {{ player.updated }}</div>
    </div>
</div>
<div class="inf v3">
    <div class="inf_row">
        
        <div class="cell active-track" style="width: 100%;">
            <div v-if="player.play_stop" class="playstatus"><img src="@/assets/icons/play.gif" alt=""></div>
            <div class="label">{{ player.current_trak_title }}</div>
        </div>
    </div>
    <div class="inf_row">
        <div class="cell net-status" style="width: 150px;" :class="{'online':player.online}">{{ player.online?'ONLINE':player.last_online }}</div>
        <div class="cell playPanel" :class="{'unavailable':!player.online}" style="width: 220px;">
            <UiPlayPuseButton :play="player.play_stop" :id_player="player.id" :unavailable="!player.online"/>
            <UiVolume :value="player.volume" :id_player="player.id" :unavailable="!player.online"/>            
        </div>
    </div>
    <div class="inf_row">
        <div class="cell ip" style="width: 220px;">IP-адрес: <br> {{ player.ip }}</div>
        <div class="cell updated" style="width: 220px;">Обновлен: <br> {{ player.updated }}</div>
    </div>
</div>
</template>


<script>
import UiPlayPuseButton from '@/components/Player/UiPlayPuseButton.vue'
import UiVolume from '@/components/Player/UiVolume.vue'

export default {
    name: 'UiPlayerInf',
    props: {
        player: [Object, String],
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
    margin-left: 20px;
    margin-right: 160px;
}

.inf{
    display: flex;
    flex-direction: row;
    width: 100%;
    height: 60px;
    margin-top: 25px;
}
.cell{
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
.online{
    background-color: #449C4A;
}
.active-track{
    display: flex;
    justify-content: flex-start;
    font-size: 14px; 
    color: #D2D2D2;
    font-family: 'Intro-Bold-Alt';
    font-size: 15px;
}
.active-track .label{
    text-align: left;
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
    min-width: 160px;
}
.ip{
    min-width: 130px;
}
.updated{
    min-width: 130px;
}
.unavailable{
    opacity: 0.3;
    cursor: wait!important;
}

.v2, .v3{
    display: none;
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 60px;
}

.inf_row{
    display: flex;
    flex-direction: row;
    justify-content: flex-end;
    width: 100%;
    margin-top: 3px;   
}

@media(max-width:1400px){
    .v1{
        display: none;
    }
    .v2{
        display: flex;
    }

    .online{
        width: 70px;
    }
    .playPanel {
        width: 35%;
    }

    .net-status{
        
        width: 20%!important;
    }
    .playPanel{
        width: 40%!important; 
    }

    .ip, .updated{
        
        width: 20%!important;      
    }
}
@media(max-width:1180px){
    .edit{
        transform: translate(0px, -72px);
    }
    .title .text{
        margin-right: 20px;
    }
}

@media(max-width:600px){
    .title .text{
        font-size: 14px;
    }
    .edit .label{
        display: none;
    }
    .v2{
        display: none;
    }
    .v3{
        display: flex;
        margin-bottom: 120px;
    }

    .net-status{
        
        width: 40%!important;
    }
    .playPanel{
        width: 60%!important; 
    }

    .ip, .updated{  
        width: 50%!important;      
    }
}

</style>