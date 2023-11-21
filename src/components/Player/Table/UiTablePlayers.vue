<template>
    <UiLoader v-if="lading"/>
    <UiNotFound v-if="notFound"/>    
    <div v-if="!lading&&!notFound" class="table-players">
    <UiTableHeader v-if="!switch_var_2" :addPlayer="!users"/> 
    <div v-for="item in filteredPlayers" :key="item.id" class="row" >
        <UiTableRow_v1 v-if="!switch_var_2" :item="item"/>
        <UiTableRow_v2 v-if="switch_var_2" :item="item"/>
    </div>
    </div>
</template>

<script>
import { getData } from '@/servis/getData.js'
import { EventBus } from '@/servis/EventBus'
import UiLoader from '@/components/UiLoader.vue'
import UiNotFound from '@/components/UiNotFound.vue'
import UiTableHeader from '@/components/Player/Table/UiTableHeader.vue'
import UiTableRow_v1 from '@/components/Player/Table/UiTableRow_v1.vue'
import UiTableRow_v2 from '@/components/Player/Table/UiTableRow_v2.vue'

const selectAdpter = {
  player: 'name',
  user:'user_name',
  place: 'city',
  online:'online',
  updated:'updated',
  play:'play_stop',
  dislike:'dislike'
}

export default {
  name: 'UiTablePlayers',
  async mounted(){
    this.updateList()
    EventBus.on('player:update', this.updateList)
    EventBus.on('find', data=>this.getFind(data))
    this.switch_variant_table()
  },
  created(){
    window.addEventListener("resize", this.switch_variant_table);
  },
  data(){
    return{
      lading:true,
      notFound:false,
      players:'',
      filterData:{},
      switch_var_2:false,
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
    UiTableRow_v1,
    UiTableRow_v2
  },
  computed:{
    filteredPlayers(){
      if(!this.players) return false
      let find = this.filterData.find
      if (!find) find = ''
      let selected = selectAdpter[this.filterData.selected]
      if(!selected) selected = 'name'
      let selected_val = this.filterData.selected_val
      selected_val = selected_val?'1':'0'
      let find_use = this.filterData.find_use
      if(find_use === undefined) find_use = true
      let result = this.players.filter((item)=>{
        if(find_use){
          return !item[selected].toLowerCase().indexOf(find.toLowerCase())
        }else{
          if(selected_val!='0'&&item[selected]!='0') return true
          return item[selected] == selected_val
        }
        
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
      this.filterData = data
    },
    switch_variant_table(){
      if(window.innerWidth<1200) this.switch_var_2 = true
      if(window.innerWidth>=1200) this.switch_var_2 = false
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