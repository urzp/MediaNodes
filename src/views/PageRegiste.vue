<template>
  <UiHeader support/>
  <div class="main">
    <UiRegForm/>
  </div>
  <UiToaster/>
  <UiFooter/>
</template>

<script>
// @ is an alias to /src
import UiFooter from '@/components/Login/UiFooter.vue'
import UiRegForm from '@/components/Login/UiRegForm.vue'
import UiHeader from '@/components/Login/UiHeader.vue'
import UiToaster from '@/components/UiToaster.vue'

export default {
  name: 'PageRegiste',
  components: {
    UiHeader,
    UiRegForm,
    UiFooter,
    UiToaster,
  }
}
</script>

<style scoped>
  .main{
    height: 100vh;
    background-color: #1F1F1F;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
</style>
