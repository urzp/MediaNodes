<template>
  <UiHeader/>
  <UiLeftBar selcted="players"/>
  <div class="content">
    <div class="title_row">
      <div class="title">Устройства</div>
      <UiSearch :show="{w_size: 800, more:false}"/>
    </div>
    <div v-if="false" class="servis-button" @click="runScript('sendEmail.php')">sendEmail.php</div>
    <UiTablePlayers/>
  </div>
</template>

<script>
// @ is an alias to /src
import UiLeftBar from '@/components/UiLeftBar.vue'
import UiHeader from '@/components/UiHeader.vue'
import UiTablePlayers from '@/components/Player/Table/UiTablePlayers.vue'
import UiSearch from '@/components/UiSearch.vue'

export default {
  name: 'PagePlayers',
  components: {
    UiLeftBar,
    UiHeader,
    UiTablePlayers,
    UiSearch
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

  
  .title_row{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;  
  }
  
  .title{
    font-family: 'Intro-Bold-Alt';
    font-size: 20px;
    color: #fff;
    margin-top: 0px;
    margin-bottom: 20px;
    margin-right: 20px;
  }


</style>
