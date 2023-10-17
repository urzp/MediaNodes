<template>
  <UiHeader/>
  <div class="main">
    <UiLoginForm/>
  </div>
  <UiFooter/>
</template>

<script>
// @ is an alias to /src
import UiFooter from '@/components/UiFooter.vue'
import UiHeader from '@/components/UiHeader.vue'
import UiLoginForm from '@/components/UiLoginForm.vue'

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
