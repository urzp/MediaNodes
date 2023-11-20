<template>
    <div class="wrap_row">

        <div class="s_row_1" @click="goToPlayer(item.id)">
          <div class="cell name" ><div class="wrap">Плеер: {{ item.name }}<br>{{ item.user_name }}</div></div >
          <div class="city_address">
            <div class="cell city" ><div class="wrap">{{ item.city }}</div></div >
            <div class="cell address"><div class="wrap">{{ item.address }}</div></div >
          </div>
        </div>
        <div class="line" @click="goToPlayer(item.id)"></div>
        <div class="s_row_2" @click="goToPlayer(item.id)">
        <div class="cell trak"><div class="wrap">{{ item.current_trak_title }}</div></div >

      </div>

      <div class="s_row_3">
        <div class="cell panel_cell" :class= "{'unavailable':!Number(item.online)}">
            <div class="panel" >
                <UiPlayPuseButton :unavailable="!Number(item.online)" :play="!!Number(item.play_stop)" :id_player="item.id"/>
                <UiVolume :unavailable="!Number(item.online)" :value="item.volume" :id_player="item.id"/>
            </div>
        </div >
        <div class="cell dislike_cell" @click="goToPlayer(item.id)">
            <div class="wrap">
                <div v-if="Number(item.dislike)" class="dislike">
                    <img src="@/assets/icons/disLike.svg" alt="dislike">
                </div>
            </div>
        </div >

      </div>   

      <div class="s_row_4" @click="goToPlayer(item.id)">
        <div class="cell ip"><div class="wrap"><div class="ip_label">IP: </div>{{ item.ip }}</div></div > 
        <div class="update_online">
          <div class="cell update"  >
            <div class="icon"><img src="@/assets/icons/update.svg" alt=""></div>
            <div class="wrap">{{ item.device_updated.toLocaleString() }}</div>
          </div >
          <div class="cell online_cell" :class="{'online':Number(item.online)}" >
              <div class="wrap">{{ Number(item.online)?'ONLINE':item.last_online.toLocaleString() }}</div>
          </div >
        </div>
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
  .name .wrap{
    text-align: left;
    line-height: 1.6;
  }
  .wrap_row{
    width: 100%;
    background-color: #2F2F2F;
    border-radius: 5px;
    margin: 10px;
    margin-left: 0px;
    margin-right: 0px;
  }
  .s_row_1, .s_row_2, .s_row_3, .s_row_4{
    margin-left:15px;
    margin-right:15px;
    margin-top: 15px;
    margin-bottom: 15px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
  }
  .s_row_1{
    margin-top: 15px;
  }
  .s_row_4{
    margin-bottom: 15px;
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


  .panel{
    width: 90%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    
  }

  .online_cell{
    width: 180px;
    height: 30px;
    background-color: #1F1F1F;
    border-radius: 5px;
    margin-right: 10px;
  }
  .online{
    width: 100px;
    background-color: #449C4A;
  }
  .ip, .update{
    height: 30px;
    margin-right: 10px;
    background-color: #434343;
    border-radius: 5px;
  }

  .ip{
    min-width: 250px;
  }

  .update{
    min-width: 200px;
  }

  .cell{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .update{
    flex-direction: row;
  }
  .icon{
    margin-right: 10px;
    margin-left: 10px;
  }
  .wrap{
    font-family: 'Intro-Book';
    font-size: 16px;  
    color: #B4B4B4;
    display: flex;
    margin-right: 10px;
    margin-left: 10px;
  }

  .online .wrap{
    color: #fff!important;
  }
  
  .update_online{
    display: flex;
    justify-content: flex-end;
    flex-wrap: wrap;
  }
 
  .ip_label{
    margin-right: 5px;
  }

  @media (max-width: 740px) or ((min-width: 900.98px) and (max-width: 1100px)){
    .ip_label{
      display: none;
    }
    .ip{
      min-width: 175px;
    }   
  }

  @media (max-width: 650px) or ((min-width: 900.98px) and (max-width: 1000px)){
    .update_online{
      flex-direction: column-reverse;
      align-items: flex-end;
    }
    .online_cell{
      margin-bottom: 10px;
    }
    .s_row_4{
      align-items: flex-end;
    }
    .panel_cell{
      transform: translate(0px, 20px);
    }
  }

  @media (max-width: 480px){
    .s_row_1, .s_row_2, .s_row_3, .s_row_4{
    margin:10px;
    }
    .wrap{
      font-size: 12px; 
    } 
    .online_cell{
      width: 160px;
    }
    .online{
      width: 80px;
    }
    .ip{
      min-width: 120px;
    }

    .update{
      min-width: 120px;
    }
  }

  @media (max-width: 400px){
    .panel_cell{
      transform: translate(0px, 10px);
    }
    .update, .online_cell, .online{
      margin-right: 0px;
    }
  }
  @media (max-width: 350px){
    .wrap{
      font-size: 10px; 
    } 
    .online_cell{
      width: 140px;
    }
    .online{
      width: 80px;
    }
  }
</style>