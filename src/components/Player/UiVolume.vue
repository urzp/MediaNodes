<template>
    <div class="icon"><img src="@/assets/icons/sound.svg" alt=""></div>
    <div class="bar">
        <div v-if="false"  class="background"></div>
        <div v-if="false"  class="active"></div>
        <div v-if="false"  class="tuning"></div>
        <input :disabled="unavailable" :class="{'unavailable':unavailable}" type="range" :value="value" @change="event => send(event.target.value)">
    </div>
</template>


<script>
import { sendCommand } from '@/servis/sendCommand.js'
import { EventBus } from '@/servis/EventBus'
export default {
    name: 'UiVolume',
    props:{
        value:String,
        id_player: String,
        unavailable: Boolean,
    },
    methods:{
      async send(val){
        await sendCommand('volume.php',{id_player: this.id_player, volume:val})
        EventBus.emit('player:update');
      }
    }

}
</script>

<style scoped>
    .icon{
        display: flex;
        align-items: center;
    }

    .bar {
        width: 50%;
        position: relative;
    }

    .background{
        width: 100%;
        height: 3px;
        background-color: #464646;
        border-radius: 2px;
    }

    .active{
        position: absolute;
        top: 0px;
        height: 3px;
        width: v-bind(value);
        background-color: #F93492;
        border-radius: 2px;       
    }

    .tuning{
        position: absolute;
        top: -1px;    
        left: calc(v-bind(value) - 3px);   
        height: 5px;
        width: 5px;
        background-color: #F93492;
        border-radius: 3px;       
    }


    input{
        width: 100%;
        
    }

    @media screen and (-webkit-min-device-pixel-ratio:0) {
    input[type='range'] {
      overflow: hidden;
      -webkit-appearance: none;
      border-radius: 5px;
      background-color: #464646;
    }
    
    input[type='range']::-webkit-slider-runnable-track {
      height: 10px;
      border-radius: 5px;
      -webkit-appearance: none;
      cursor: pointer;
      color: #F93492;
      margin-top: -6px;
    }
    
    input[type='range']::-webkit-slider-thumb {
      width: 5px;
      -webkit-appearance: none;
      height: 5px;
      border-radius: 5px;
      cursor: pointer;
      background: #F93492;
      box-shadow: -80px 0 0 80px #F93492;
    }

}
/** FF*/
input[type="range"]::-moz-range-progress {
  background-color: #F93492; 
}
input[type="range"]::-moz-range-track {  
  background-color: #9a905d;
}
/* IE*/
input[type="range"]::-ms-fill-lower {
  background-color: #F93492; 
}
input[type="range"]::-ms-fill-upper {  
  background-color: #9a905d;
}
.unavailable::-webkit-slider-thumb{
  cursor: wait!important;
}
.unavailable::-webkit-slider-runnable-track {
  cursor: wait!important;
}
</style>