<template>
  <UiHeader/>
  <UiLeftBar selcted="user"/>
  <div class="content">
    <UiUser/>
  </div>
</template>

<script>
// @ is an alias to /src
import UiLeftBar from '@/components/UiLeftBar.vue'
import UiHeader from '@/components/UiHeader.vue'
import UiUser from '@/components/UiUser.vue'

export default {
  name: 'HomeView',
  components: {
    UiLeftBar,
    UiHeader,
    UiUser,
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
