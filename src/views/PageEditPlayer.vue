<template>
    <UiHeader/>
    <UiLeftBar selcted="players"/>
    <div class="content">
      <UiPlayerEdit :player="player"/>
    </div>
</template>


<script>
// @ is an alias to /src
import getPlayers from '@/servis/testPlayers.js'
import UiLeftBar from '@/components/UiLeftBar.vue'
import UiHeader from '@/components/UiHeader.vue'
import UiPlayerEdit from '@/components/UiPlayerEdit.vue'

export default {
  name: 'HomeView',
  components: {
    UiLeftBar,
    UiHeader,
    UiPlayerEdit,
  },
  computed:{
    playerId(){
      return this.$route.params.playerId;
    },
    player() {
      return getPlayers.find(item => item.id == this.playerId);
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
    padding-left: 390px;
    width: calc(100% - 390px - 70px);
  }

</style>