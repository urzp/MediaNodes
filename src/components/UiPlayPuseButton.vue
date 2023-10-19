<template>
    <div v-if="!play" class='button play'><img src="@/assets/icons/playButton.svg" alt="playButton"></div>
    <div v-if="play" class='button pause'><img src="@/assets/icons/pauseButton.svg" alt="playButton"></div>
</template>

<script>
export default {
  name: 'UiPlayPuseButton',
  props:{
    play: Boolean,
  }
}
</script>

<style scoped>
    .button{
        display: flex;
        align-items: center;
    }
</style>