<template>
    <UiHeader/>
    <UiLeftBar selcted="users"/>
    <div class="content">
      <UiUserPlayers :userId="userId"/>
    </div>
  </template>
  
  <script>
  // @ is an alias to /src
  import UiLeftBar from '@/components/UiLeftBar.vue'
  import UiHeader from '@/components/UiHeader.vue'
  import UiUserPlayers from '@/components/User/UiUserPlayers.vue'
  
  export default {
    name: 'PagePlayer',
    components: {
      UiLeftBar,
      UiHeader,
      UiUserPlayers,
    },
    computed:{
        userId(){
        return this.$route.params.userId;
      },
    }
  }
  </script>
  
  <style scoped>
    .content{
      position: absolute;
      margin-top: 105px;
      margin-bottom: 100px;
      display: flex;
      align-items: flex-start;
      justify-content: flex-start;
      flex-direction: column;
      padding-left: 330px;
      width: calc(100% - 300px - 70px);
    }
  
  </style>
  