<template>
    <div v-if="!play" class='button play' @click="play_pause(true)"><img src="@/assets/icons/playButton.svg" alt="playButton"></div>
    <div v-if="play" class='button pause'  @click="play_pause(false)"><img src="@/assets/icons/pauseButton.svg" alt="playButton"></div>
</template>

<script>
import { sendCommand } from '@/servis/sendCommand.js'
import { EventBus } from '@/servis/EventBus'
export default {
  name: 'UiPlayPuseButton',
  props:{
    play: Boolean,
    id_player: String,
  },
  methods:{
    async play_pause(value){
      await sendCommand('play_stop.php',{id_player: this.id_player, play_pause:value})
      EventBus.emit('player:update');
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