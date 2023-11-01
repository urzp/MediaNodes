<template>
    <UiHeader/>
    <UiLeftBar selcted="players"/>
    <div class="content">
      <UiPlayerNew/>
    </div>
    <UiToaster/>
</template>


<script>
// @ is an alias to /src
import UiLeftBar from '@/components/UiLeftBar.vue'
import UiHeader from '@/components/UiHeader.vue'
import UiPlayerNew from '@/components/Player/UiPlayerNew.vue'
import UiToaster from '@/components/UiToaster.vue'

export default {
  name: 'PageNewPlayer',
  components: {
    UiLeftBar,
    UiHeader,
    UiPlayerNew,
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