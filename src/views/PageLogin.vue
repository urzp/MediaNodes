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
    min-height: calc(100vh - 270px);
    margin-top: 130px;
    margin-bottom: 60px;
    background-color: #1F1F1F;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
</style>
