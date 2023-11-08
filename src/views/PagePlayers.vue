<template>
  <UiHeader/>
  <UiLeftBar selcted="players"/>
  <div class="content">
    <div class="title">Устройства</div>
    <div v-if="false" class="servis-button" @click="runScript('sendEmail.php')">sendEmail.php</div>
    <UiTablePlayers/>
  </div>
</template>

<script>
// @ is an alias to /src
import UiLeftBar from '@/components/UiLeftBar.vue'
import UiHeader from '@/components/UiHeader.vue'
import UiTablePlayers from '@/components/Player/UiTablePlayers.vue'

export default {
  name: 'PagePlayers',
  components: {
    UiLeftBar,
    UiHeader,
    UiTablePlayers
  },
  methods:{
    runScript(name){
      getData(name)
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

  
  .title{
    font-family: 'Intro-Bold-Alt';
    font-size: 20px;
    color: #fff;
    margin-top: 20px;
  }

</style>
