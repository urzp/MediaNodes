<template>
  <UiHeader/>
  <UiLeftBar selcted="user"/>
  <div class="content">
    <UiUser/>
  </div>
  <UiToaster/>
</template>

<script>
// @ is an alias to /src
import UiLeftBar from '@/components/UiLeftBar.vue'
import UiHeader from '@/components/UiHeader.vue'
import UiUser from '@/components/User/UiUser.vue'
import UiToaster from '@/components/UiToaster.vue'

export default {
  name: 'HomeView',
  components: {
    UiLeftBar,
    UiHeader,
    UiUser,
    UiToaster,
  },
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
