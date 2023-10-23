<template>
  <UiHeader support/>
  <div class="main">
    <UiLoginForm/>
  </div>
  <UiFooter/>
</template>

<script>
// @ is an alias to /src
import UiFooter from '@/components/Login/UiFooter.vue'
import UiHeader from '@/components/Login/UiHeader.vue'
import UiLoginForm from '@/components/Login/UiLoginForm.vue'

export default {
  name: 'HomeView',
  components: {
    UiHeader,
    UiFooter,
    UiLoginForm,
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
