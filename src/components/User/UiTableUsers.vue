<template>
    <div class="title">Пользователи</div>
    <UiLoader v-if="lading"/>
    <UiNotFound v-if="notFound"/>    
    <div v-if="!lading&&!notFound" class="table-players">
      <div class="header">
          <div v-for="item in header" :key="item.key" :style="{'width': item.width}">
            {{ item.name }}
          </div>
      </div>
      
      <div v-for="item in users" :key="item.id" class="row" >
        
        <div class="name-icon" :style="{'width': header[0].width}" @click="goToUser(item.id)">
          <div class="icon"><img :src="url_avatars(item)" alt=""></div>
          <div class="text">{{ item.name }}</div>
        </div>
        <div :style="{'width': header[1].width}" @click="goToUser(item.id)"><div class="text">{{ item.email }}</div></div>
        <div :style="{'width': header[2].width}" @click="goToUser(item.id)"><div class="text">{{ item.tel}}</div></div>
        <div :style="{'width': header[3].width}" @click="goToUser(item.id)"><div class="text">{{ item.level }}</div></div>
        <div :style="{'width': header[4].width}" @click="goToUser(item.id)"><div class="text">{{ 0 }}</div></div>
      </div>
      
    </div>
</template>

<script>
import { getData } from '@/servis/getData.js'
import { EventBus } from '@/servis/EventBus'
import UiLoader from '@/components/UiLoader.vue'
import UiNotFound from '@/components/UiNotFound.vue'

export default {
  name: 'UiTableUsers',
  async mounted(){
    this.updateList()
    EventBus.on('player:update', this.updateList)
  },
  data(){
    return{
      lading:true,
      notFound:false,
      header:[
        {key:1,name:'Имя / Компания', width: '30%'},
        {key:2,name:'Email', width: '30%'},
        {key:3,name:'Телефон', width: '15%'},
        {key:4,name:'Уровень', width: '12.5%'},
        {key:6,name:'Сообщение', width: '12.5%'},
      ],
      users:''
    }
  },
  components: {

    UiLoader,
    UiNotFound
  },
  methods:{
    goToUser(id){
      this.$router.push(`/users/${id}`)
    },
    runScript(name){
      getData(name)
    },
    async updateList(){
      let result = await getData('readUsers.php')
      if(!this.checkResult(result)) return false
      this.users = await result.users
    },
    checkResult(result){
            this.lading = false
            if (result.success) return true
            this.notFound = true
            return false
    },
    url_avatars(user){
            let url = window.baseUrl + 'img/default/avatar.svg'
            if(user.img) url = window.baseUrl + `img/user_${user.id}/${user.img}`
            return url
    },
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
  .row :nth-child(1), .row :nth-child(2), .row {
    justify-content: flex-start;
    text-align: left;
  }

  .row :nth-child(2){
    text-transform: lowercase;
  }

  .row :nth-child(1) .text, .row :nth-child(2) .text{
    margin-left: 20px;
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

  .name-icon{
    justify-content: flex-start!important;
    display: flex!important;
    text-align: left!important;
  }
  .icon img{
    height: 26px;
  }
  .name-icon .text{
    text-transform: uppercase;
  }
</style>