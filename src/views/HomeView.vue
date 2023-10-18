<template>
  <UiHeader/>
  <UiLeftBar/>
  <div class="content">
    <UiTablePlayers/>
  </div>
</template>

<script>
// @ is an alias to /src
import UiLeftBar from '@/components/UiLeftBar.vue'
import UiHeader from '@/components/UiHeader.vue'
import UiTablePlayers from '@/components/UiTablePlayers.vue'

export default {
  name: 'HomeView',
  components: {
    UiLeftBar,
    UiHeader,
    UiTablePlayers
  }
}
</script>

<style scoped>
  .content{
    position: absolute;
    height: 150vh;
    margin-top: 105px;
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    flex-direction: column;
    padding-left: 330px;
    width: calc(100% - 300px - 70px);
  }

</style>
