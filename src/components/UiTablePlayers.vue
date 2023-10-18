<template>
    <div class="title">Устройства</div>  
    <div class="table-players">
      <div class="header">
          <div v-for="item in header" :key="item.key" :style="{'width': item.width}">{{ item.name }}</div>
      </div>
      <div v-for="item in players" :key="item.name" class="row">
        <div :style="{'width': header[0].width}">{{ item.name }}</div>
        <div :style="{'width': header[1].width}">{{ item.city }}</div>
        <div :style="{'width': header[2].width}">{{ item.address }}</div>
        <div :style="{'width': header[3].width}">{{ item.act_track }}</div>
        <div :style="{'width': header[4].width}">{{ item.ip }}</div>
        <div :style="{'width': header[5].width}" :class="{'online':item.online}">{{ item.online?'ONLINE':item.last_online.toLocaleString() }}</div>
        <div :style="{'width': header[6].width}" >{{ item.updated.toLocaleString() }}</div>
        <div :style="{'width': header[7].width}" >{{ item.volme }}</div>
        <div :style="{'width': header[8].width}" >{{ item.dislike }}</div>
      </div>
    </div>
</template>

<script>
import getPlayers from '@/servis/testPlayers.js'
export default {
  name: 'UiTablePlayers',
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
      players: getPlayers,
    }
  },
  components: {

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
</style>