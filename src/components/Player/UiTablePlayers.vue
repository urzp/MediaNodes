<template>
    <div class="title">Устройства</div>
    <div v-if="false" class="servis-button" @click="runScript('sendEmail.php')">sendEmail.php</div>
    <UiLoader v-if="lading"/>
    <UiNotFound v-if="notFound"/>    
    <div v-if="!lading&&!notFound" class="table-players">
      <div class="header">
          <div v-for="item, i in header" :key="item.key" :style="{'width': item.width}">
            {{ item.name }}
            <div v-if="i==0" class="add_player" @click="$router.push({ name: 'addPlayer' })"><img src="@/assets/icons/plus.svg" alt=""></div>
          </div>
      </div>
      <div v-for="item in players" :key="item.id" class="row" >
        <div :style="{'width': header[0].width}" @click="goToPlayer(item.id)">{{ item.name }}</div>
        <div :style="{'width': header[1].width}" @click="goToPlayer(item.id)">{{ item.city }}</div>
        <div :style="{'width': header[2].width}" @click="goToPlayer(item.id)">{{ item.address }}</div>
        <div :style="{'width': header[3].width}" @click="goToPlayer(item.id)" >{{ item.current_trak_title/*  */ }}</div>
        <div :style="{'width': header[4].width}" @click="goToPlayer(item.id)" >{{ item.ip }}</div>
        <div :style="{'width': header[5].width}" @click="goToPlayer(item.id)" :class="{'online':Number(item.online)}">{{ Number(item.online)?'ONLINE':item.last_online.toLocaleString() }}</div>
        <div :style="{'width': header[6].width}" @click="goToPlayer(item.id)" >{{ item.device_updated.toLocaleString() }}</div>
        <div :style="{'width': header[7].width}" :class="{'unavailable':!Number(item.online)}" >
          <div class="panel" >
            <UiPlayPuseButton :unavailable="!Number(item.online)" :play="!!Number(item.play_stop)" :id_player="item.id"/>
            <UiVolume :unavailable="!Number(item.online)" :value="item.volume" :id_player="item.id"/>
          </div>
        </div>
        <div :style="{'width': header[8].width}" >
            <div v-if="Number(item.dislike)" class="dislike"><img src="@/assets/icons/disLike.svg" alt="dislike"></div>
        </div>
      </div>
    </div>
</template>

<script>
import { getData } from '@/servis/getData.js'
import UiPlayPuseButton from '@/components/Player/UiPlayPuseButton.vue'
import UiVolume from '@/components/Player/UiVolume.vue'
import { EventBus } from '@/servis/EventBus'
import UiLoader from '@/components/UiLoader.vue'
import UiNotFound from '@/components/UiNotFound.vue'

export default {
  name: 'UiTablePlayers',
  async mounted(){
    this.updateList()
    EventBus.on('player:update', this.updateList)
    this.onResize();
    window.addEventListener('resize', this.onResize);
  },
  data(){
    return{
      lading:true,
      notFound:false,
      header:[
        {key:1,name:'Плеер', width: '8.9%'},
        {key:2,name:'Город', width: '10%'},
        {key:3,name:'Адрес локации', width: '12%'},
        {key:4,name:'Проигрываемый трек', width: '24.6%'},
        {key:5,name:'IP Адрес', width: '8.9%'},
        {key:6,name:'Был в сети', width: '7.3%'},
        {key:7,name:'Обновлен', width: '7.3%'},
        {key:8,name:'Элементы управления', width: '13.6%'},
        {key:9,name:'Дизлайки', width: '5.5%'},
      ],
      players:'',
      width: 0,
    }
  },
  components: {
    UiPlayPuseButton,
    UiVolume,
    UiLoader,
    UiNotFound
  },
  methods:{
    goToPlayer(id){
      this.$router.push(`/players/${id}`)
    },
    runScript(name){
      getData(name)
    },
    async updateList(){
      let result = await getData('readPlayers.php')
      if(!this.checkResult(result)) return false
      this.players = await result.players 
    },
    checkResult(result){
            this.lading = false
            if (result.success) return true
            this.notFound = true
            return false
    },
    onResize(){
      this.width = window.innerWidth;
    }
  },
}
</script>

<style scoped>
  .title{
    font-family: 'Intro-Bold-Alt';
    font-size: 20px;
    color: #fff;
    margin-top: 20px;
  }

  .add_player{
    margin: 12px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 22px;
    height: 22px;
    border-radius: 15px;
    background-color: #383838;
    cursor: pointer;
    
  }

  .table-players{
    margin-top: 25px ;
    width: 100%;
  }

  .header, .row{
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-items: center;
  }
  .header>div, .row>div{
    display: flex;
    align-items: center;
    justify-content: center;
    color:#ffffffa1;
    font-family: 'Intro-Bold-Alt';
    font-size: 10px;
    text-transform: uppercase;
    background-color: #191919;
    border-radius:5px ;
    height: 60px;
    margin-right: 3px;
    padding-left: 10px;
    padding-right: 10px;
  }

  .row>div{
    font-family: 'Intro-Book';
    font-size: 12px;  
    color: #fff;
    background-color: #2F2F2F;
    margin-top: 5px;
    padding-left: 10px;
    padding-right: 10px;
    line-height: 1.6;
  }
  .row :nth-child(2), .row :nth-child(3), .row  :nth-child(4){
    justify-content: flex-start;
    text-align: left;
  }
  .row .online{
    background-color: #449C4A;
  }
  .row{
    cursor: pointer;
  }
  .panel{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-around;
  }

  .dislike{
    display: flex;
    align-items: center;
  }
  .servis-button{
    color: #fff;
    margin: 20px 0px;
    padding: 20px 40px;
    border: 1px solid #fff;
    border-radius: 10px;
    cursor: pointer;
  }

  .unavailable{
    opacity: 0.3;
    cursor: wait;
  }

  @media (max-width: 1839.98px) { 
    .header :nth-child(5){
      display: none;
    }
    .row :nth-child(5){
      display: none;
    }
  }

  @media (max-width: 1699.98px) { 
    .header :nth-child(4){
      display: none;
    }
    .row :nth-child(4){
      display: none;
    }

    .header > :nth-child(1), .row > :nth-child(1){
      min-width: 130px!important;
    }

    .header :nth-child(2), .row > :nth-child(2){
      width: 20%!important;
    }

    .header :nth-child(3), .row > :nth-child(3){
      width: 25%!important;
    }
    .header :nth-child(6), .row > :nth-child(6){
      min-width: 90px!important;
    }
    .header :nth-child(7), .row > :nth-child(7){
      min-width: 90px!important;
    }
    .header :nth-child(8), .row > :nth-child(8){
      min-width: 180px!important;
    }
  }

  @media (max-width: 1499.98px) { 
    .header :nth-child(3){
      display: none;
    }
    .row > :nth-child(3){
      display: none;
    }  
    .header :nth-child(2), .row > :nth-child(2){
      width: 50%!important;
    }
  }
</style>