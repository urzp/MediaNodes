<template>
  <UiHeader/>
  <div class="main">
    <UiRequestResetPasswordForm/>
  </div>
  <UiFooter/>
</template>

<script>
// @ is an alias to /src
import UiFooter from '@/components/Login/UiFooter.vue'
import UiHeader from '@/components/Login/UiHeader.vue'
import UiRequestResetPasswordForm from '@/components/Login/UiRequestResetPasswordForm.vue'

export default {
  name: 'HomeView',
  components: {
    UiHeader,
    UiFooter,
    UiRequestResetPasswordForm,
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
