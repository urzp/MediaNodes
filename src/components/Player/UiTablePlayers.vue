<template>
      <div class="title">Устройства</div>
      

    <div class="table-players">
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
        <div :style="{'width': header[3].width}" @click="goToPlayer(item.id)">{{ item.cuttent_track }}</div>
        <div :style="{'width': header[4].width}" @click="goToPlayer(item.id)">{{ item.ip }}</div>
        <div :style="{'width': header[5].width}" @click="goToPlayer(item.id)" :class="{'online':Number(item.online)}">{{ Number(item.online)?'ONLINE':item.last_online.toLocaleString() }}</div>
        <div :style="{'width': header[6].width}" @click="goToPlayer(item.id)" >{{ item.device_updated.toLocaleString() }}</div>
        <div :style="{'width': header[7].width}"  >
          <div class="panel">
            <UiPlayPuseButton :play="!!Number(item.play_stop)"/>
            <UiVolume :value="Number(item.volume) + '%'"/>
          </div>
        </div>
        <div :style="{'width': header[8].width}" >
            <div v-if="Number(item.dislike)" class="dislike"><img src="@/assets/icons/disLike.svg" alt="dislike"></div>
        </div>
      </div>
    </div>
</template>

<script>
import { readPlayers } from '@/servis/readPlayers.js'
import UiPlayPuseButton from '@/components/Player/UiPlayPuseButton.vue'
import UiVolume from '@/components/Player/UiVolume.vue'

export default {
  name: 'UiTablePlayers',
  async created(){
    this.players = await readPlayers()
  },
  data(){
    return{
      header:[
        {key:1,name:'Плеер', width: '8.9%'},
        {key:2,name:'Город', width: '10%'},
        {key:3,name:'Адрес локации', width: '16.6%'},
        {key:4,name:'Проигрываемый трек', width: '20%'},
        {key:5,name:'IP Адрес', width: '8.9%'},
        {key:6,name:'Был в сети', width: '7.3%'},
        {key:7,name:'Обновлен', width: '7.3%'},
        {key:8,name:'Элементы управления', width: '13.6%'},
        {key:9,name:'Дизлайки', width: '5.5%'},
      ],
      players:''
    }
  },
  components: {
    UiPlayPuseButton,
    UiVolume,
  },
  methods:{
    goToPlayer(id){
      this.$router.push(`/players/${id}`)
    }
  }
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
</style>