<template>
    <colum class="table-col-1" @click="goToPlayer(item.id)"><div class="wrap">{{ item.name }}</div></colum>
    <colum class="table-col-2" @click="goToPlayer(item.id)"><div class="wrap">{{ item.city }}</div></colum>
    <colum class="table-col-3" @click="goToPlayer(item.id)"><div class="wrap">{{ item.address }}</div></colum>
    <colum class="table-col-4" @click="goToPlayer(item.id)"><div class="wrap">{{ item.current_trak_title }}</div></colum>
    <colum class="table-col-5" @click="goToPlayer(item.id)"><div class="wrap">{{ item.ip }}</div></colum>
    <colum class="table-col-6" :class="{'online':Number(item.online)}" @click="goToPlayer(item.id)">
        <div class="wrap">{{ Number(item.online)?'ONLINE':item.last_online.toLocaleString() }}</div>
    </colum>
    <colum class="table-col-7" @click="goToPlayer(item.id)" ><div class="wrap">{{ item.device_updated.toLocaleString() }}</div></colum>

    <colum class="table-col-8" :class= "{'unavailable':!Number(item.online)}">
        <div class="panel" >
            <UiPlayPuseButton :unavailable="!Number(item.online)" :play="!!Number(item.play_stop)" :id_player="item.id"/>
            <UiVolume :unavailable="!Number(item.online)" :value="item.volume" :id_player="item.id"/>
        </div>
    </colum>

    <colum class="table-col-9" >
        <div class="wrap">
            <div v-if="Number(item.dislike)" class="dislike">
                <img src="@/assets/icons/disLike.svg" alt="dislike">
            </div>
        </div>
    </colum>
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
  colum{
    display: flex;
    align-items: center;
    justify-content: center;
    text-transform: uppercase;
    border-radius:5px ;
    height: 60px;
    margin-right: 3px;
    font-family: 'Intro-Book';
    font-size: 12px;  
    color: #fff;
    background-color: #2F2F2F;
    margin-top: 5px;
    line-height: 1.6;
    cursor: pointer;
  }

  @import "./widthColloms.css";
  
  .table-col-2, .table-col-3, .table-col-4{
    justify-content: flex-start;
    text-align: left;
  }

  .wrap{
    margin-left: 10px;
    margin-right: 10px;
  }
  .online{
    background-color: #449C4A;
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


</style>