<template>
  <UiHeader/>
  <div class="main">
    <UiRegForm v-if="true"/>
    <UiLoginForm v-if="false"/>
    <UiRequestResetPasswordForm v-if="false"/>
  </div>
  <UiFooter/>
</template>

<script>
// @ is an alias to /src
import UiFooter from '@/components/UiFooter.vue'
import UiRegForm from '@/components/UiRegForm.vue'
import UiHeader from '@/components/UiHeader.vue'
import UiLoginForm from '@/components/UiLoginForm.vue'
import UiRequestResetPasswordForm from '@/components/UiRequestResetPasswordForm.vue'

export default {
  name: 'HomeView',
  components: {
    UiHeader,
    UiRegForm,
    UiFooter,
    UiLoginForm,
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
