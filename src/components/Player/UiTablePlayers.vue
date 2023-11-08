<template>
    <UiLoader v-if="lading"/>
    <UiNotFound v-if="notFound"/>    
    <div v-if="!lading&&!notFound" class="table-players">
      <div class="header">
          <div v-for="item, i in header" :key="item.key" :class="header[i].class">
            {{ item.name }}
            <div v-if="i==0&&!users" class="add_player" @click="$router.push({ name: 'addPlayer' })"><img src="@/assets/icons/plus.svg" alt=""></div>
          </div>
      </div>
      <div v-for="item in players" :key="item.id" class="row" >
        <div :class="header[0].class" @click="goToPlayer(item.id)"><div class="wrap">{{ item.name }}</div></div>
        <div :class="header[1].class" @click="goToPlayer(item.id)"><div class="wrap">{{ item.city }}</div></div>
        <div :class="header[2].class" @click="goToPlayer(item.id)"><div class="wrap">{{ item.address }}</div></div>
        <div :class="header[3].class" @click="goToPlayer(item.id)"><div class="wrap">{{ item.current_trak_title }}</div></div>
        <div :class="header[4].class" @click="goToPlayer(item.id)"><div class="wrap">{{ item.ip }}</div></div>
        <div :class="[header[5].class, {'online':Number(item.online)}]" @click="goToPlayer(item.id)"><div class="wrap">{{ Number(item.online)?'ONLINE':item.last_online.toLocaleString() }}</div></div>
        <div :class="header[6].class" @click="goToPlayer(item.id)" ><div class="wrap">{{ item.device_updated.toLocaleString() }}</div></div>
        <div :class="[header[7].class, {'unavailable':!Number(item.online)}]">
          <div class="panel" >
            <UiPlayPuseButton :unavailable="!Number(item.online)" :play="!!Number(item.play_stop)" :id_player="item.id"/>
            <UiVolume :unavailable="!Number(item.online)" :value="item.volume" :id_player="item.id"/>
          </div>
        </div>
        <div :class="header[8].class" ><div class="wrap">
            <div v-if="Number(item.dislike)" class="dislike"><img src="@/assets/icons/disLike.svg" alt="dislike"></div>
        </div></div>
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
  },
  data(){
    return{
      lading:true,
      notFound:false,
      header:[
        {key:1, class:'table-col-1', name:'Плеер', width: '8.9%'},
        {key:2, class:'table-col-2', name:'Город', width: '10%'},
        {key:3, class:'table-col-3', name:'Адрес локации', width: '12%'},
        {key:4, class:'table-col-4', name:'Проигрываемый трек', width: '24.6%'},
        {key:5, class:'table-col-5', name:'IP Адрес', width: '8.9%'},
        {key:6, class:'table-col-6', name:'Был в сети', width: '7.3%'},
        {key:7, class:'table-col-7', name:'Обновлен', width: '7.3%'},
        {key:8, class:'table-col-8', name:'Элементы управления', width: '13.6%'},
        {key:9, class:'table-col-9', name:'Дизлайки', width: '5.5%'},
      ],
      players:'',
      width: 0,
    }
  },
  props:{
    user: Object,
    users: Boolean,
  },
  components: {
    UiPlayPuseButton,
    UiVolume,
    UiLoader,
    UiNotFound,
  },
  methods:{
    goToPlayer(id){
      this.$router.push(`/players/${id}`)
    },
    async updateList(){
      let user_id = this.user?this.user.id:'';
      let user_level = this.user?this.user.level:'';
      let adress_php = this.users?'readUserPlayers.php':'readPlayers.php'
      let result = await getData(adress_php, {user_id, user_level})
      if(!this.checkResult(result)) return false
      this.players = await result.players 
    },
    checkResult(result){
            this.lading = false
            if (result.success) return true
            this.notFound = true
            return false
    }
  },
}
</script>

<style scoped>

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
  }

  .row>div{
    font-family: 'Intro-Book';
    font-size: 12px;  
    color: #fff;
    background-color: #2F2F2F;
    margin-top: 5px;
    line-height: 1.6;
  }

  .table-col-1{
    width: 8.9%;
    min-width: 130px;
  }
  .table-col-2{
    width: 10%;
  }
  .table-col-3{
    width: 12%;
  }
  .table-col-4{
    width: 24.6%;
  }
  .table-col-5{
    width: 8.9%;
  }
  .table-col-6{
    width: 7.3%;
    min-width: 90px;
  }
  .table-col-7{
    width: 7.3%;
    min-width: 90px;
  }
  .table-col-8{
    width: 13.6%;
    min-width: 180px;
  }
  .table-col-9{
    width: 5.5%;
    min-width: 70px;
  }
  .row .table-col-2, .row .table-col-3, .row  .table-col-4{
    justify-content: flex-start;
    text-align: left;
  }

  .row .wrap{
    margin-left: 10px;
    margin-right: 10px;
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
    .table-col-5{
      display: none!important;
    }
    .table-col-4{
      width: 33.3%!important;
    }
  }

  @media (max-width: 1699.98px) { 
    .table-col-4{
      display: none!important;
    }
    .table-col-2{
      width: 20%!important;
    }

    .table-col-3{
      width: 40%!important;
    }

  }

  @media (max-width: 1499.98px) { 
    .table-col-3{
      display: none!important;
    }
    .table-col-2{
      width: 50%!important;
    }
  }
</style>