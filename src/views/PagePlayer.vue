<template>
  <UiHeader/>
  <UiLeftBar selcted="players"/>
  <div class="content">
    <UiPlayer :playerId="playerId"/>
  </div>
</template>

<script>
// @ is an alias to /src
import UiLeftBar from '@/components/UiLeftBar.vue'
import UiHeader from '@/components/UiHeader.vue'
import UiPlayer from '@/components/UiPlayer.vue'

export default {
  name: 'PagePlayer',
  components: {
    UiLeftBar,
    UiHeader,
    UiPlayer,
  },
  computed:{
    playerId(){
      return this.$route.params.playerId;
    },
  }
}
</script>

<style scoped>
  .content{
    position: absolute;
    
    margin-top: 105px;
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    flex-direction: column;
    padding-left: 330px;
    width: calc(100% - 300px - 70px);
  }

</style>
