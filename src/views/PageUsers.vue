<template>
  <UiHeader/>
  <UiLeftBar selcted="users"/>
  <div class="content">
    <UiTableUsers/>
  </div>
</template>

<script>
// @ is an alias to /src
import UiLeftBar from '@/components/UiLeftBar.vue'
import UiHeader from '@/components/UiHeader.vue'
import UiTableUsers from '@/components/User/UiTableUsers.vue'

export default {
  name: 'PagePlayers',
  components: {
    UiLeftBar,
    UiHeader,
    UiTableUsers,
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
