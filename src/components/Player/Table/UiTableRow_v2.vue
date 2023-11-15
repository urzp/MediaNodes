<template>
    <div class="wrap_row">

        <div class="s_row_1">
          <div class="cell name" @click="goToPlayer(item.id)"><div class="wrap">Плеер: {{ item.name }}</div></div >
          <div class="city_address">
            <div class="cell city" @click="goToPlayer(item.id)"><div class="wrap">{{ item.city }}</div></div >
            <div class="cell address" @click="goToPlayer(item.id)"><div class="wrap">{{ item.address }}</div></div >
          </div>
        </div>
        <div class="line"></div>
        <div class="s_row_2">
        <div class="cell trak" @click="goToPlayer(item.id)"><div class="wrap">{{ item.current_trak_title }}</div></div >
        <div class="cell dislike_cell" >
            <div class="wrap">
                <div v-if="Number(item.dislike)" class="dislike">
                    <img src="@/assets/icons/disLike.svg" alt="dislike">
                </div>
            </div>
        </div >
      </div>

      <div class="s_row_3">
        <div class="cell panel_cell" :class= "{'unavailable':!Number(item.online)}">
            <div class="panel" >
                <UiPlayPuseButton :unavailable="!Number(item.online)" :play="!!Number(item.play_stop)" :id_player="item.id"/>
                <UiVolume :unavailable="!Number(item.online)" :value="item.volume" :id_player="item.id"/>
            </div>
        </div >
        <div class="cell online_cell" :class="{'online':Number(item.online)}" @click="goToPlayer(item.id)">
            <div class="wrap">{{ Number(item.online)?'ONLINE':item.last_online.toLocaleString() }}</div>
        </div >
      </div>   

      <div class="s_row_4">
        <div class="cell ip" @click="goToPlayer(item.id)"><div class="wrap">{{ item.ip }}</div></div > 
        <div class="cell update" @click="goToPlayer(item.id)" ><div class="wrap">{{ item.device_updated.toLocaleString() }}</div></div >
      </div>

    </div>
</template>


<script>
import UiPlayPuseButton from '@/components/Player/UiPlayPuseButton.vue'
import UiVolume from '@/components/Player/UiVolume.vue'
export default {
    name: 'UiTableRow',
    props:{
        item: Object,
    },
    components:{
        UiPlayPuseButton,
        UiVolume,
    },
    methods:{
        goToPlayer(id){
            this.$router.push(`/players/${id}`)
        },
    }
}
</script>

<style scoped>
  .wrap_row{
    width: 50%;
    height: 200px;
    background-color: #2F2F2F;
    border-radius: 5px;
    margin: 10px;
    margin-left: 0px;
  }
  .s_row_1{
    margin: 15px;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: center;
  }
  .city_address{
    display: flex;
    flex-direction: column;
    align-content: flex-end;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: nowrap;
  }
  .city{
    margin-bottom: 5px;
  }

  .line{
    height: 2px;
    margin-left:10px;
    margin-right:10px;
    background-color: #ffffff1d;
  }

  .s_row_2{
    margin: 15px;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: center;
  }

  .trak{
    text-align: left;
    margin-right: 10px;
  }

  .dislike{
    width: 30px;
    height: 30px;
    border-radius: 15px ;
    background-color: #434343;
    display: flex;
    flex-direction: row;
    align-content: center;
    justify-content: center;
    align-items: center;
  }

  .s_row_3{
    margin-left:10px;
    margin-right:10px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
  }
  .panel{
    width: 90%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    
  }
  .wrap{
    font-family: 'Intro-Book';
    font-size: 12px;  
    color: #B4B4B4;
    display: flex;
  }

 
</style>