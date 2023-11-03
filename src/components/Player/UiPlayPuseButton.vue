<template>
    <div v-if="!play" class='button play' @click="palay()"><img src="@/assets/icons/playButton.svg" alt="playButton"></div>
    <div v-if="play" class='button pause'  @click="pause()"><img src="@/assets/icons/pauseButton.svg" alt="playButton"></div>
</template>

<script>
import { sendCommand } from '@/servis/sendCommand.js'
export default {
  name: 'UiPlayPuseButton',
  props:{
    play: Boolean,
    id_player: String,
  },
  methods:{
    palay(){
      sendCommand('play_stop.php',{id_player: id_player, play_pause:true})
    },
    pause(){
      sendCommand('play_stop.php',{id_player: id_player, play_pause:false})
    }
  }
}
</script>

<style scoped>
    .button{
        display: flex;
        align-items: center;
        cursor: pointer;
    }
</style>