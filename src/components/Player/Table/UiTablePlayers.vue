<template>
    <UiLoader v-if="lading"/>
    <UiNotFound v-if="notFound"/>    
    <div v-if="!lading&&!notFound" class="table-players">
    <UiTableHeader/> 
    <div v-for="item in filteredPlayers" :key="item.id" class="row" >
        <UiTableRow :item="item"/>
    </div>
    </div>
</template>

<script>
import { getData } from '@/servis/getData.js'
import { EventBus } from '@/servis/EventBus'
import UiLoader from '@/components/UiLoader.vue'
import UiNotFound from '@/components/UiNotFound.vue'
import UiTableHeader from '@/components/Player/Table/UiTableHeader.vue'
import UiTableRow from '@/components/Player/Table/UiTableRow.vue'

export default {
  name: 'UiTablePlayers',
  async mounted(){
    this.updateList()
    EventBus.on('player:update', this.updateList)
    EventBus.on('find', data=>this.getFind(data))
  },
  data(){
    return{
      lading:true,
      notFound:false,
      players:'',
      find:'',
    }
  },
  props:{
    user: Object,
    users: Boolean,
  },
  components: {
    UiLoader,
    UiNotFound,
    UiTableHeader,
    UiTableRow
  },
  computed:{
    filteredPlayers(){
      let find = this.find
      if(!this.players) return false
      let result = this.players.filter((item)=>{
        return !item.city.indexOf(find)
      })
      return result
    }
  },
  methods:{

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
    },  
    getFind(data){
      this.find = data.find
    }
  },
}
</script>

<style scoped>

  .table-players{
    margin-top: 25px ;
    width: 100%;
  }

  .row{
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-items: center;
  }
</style>