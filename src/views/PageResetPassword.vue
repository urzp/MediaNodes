<template>
  <UiHeader support/>
  <div class="main">
    <UiRequestResetPasswordForm v-if="!setNewPassword" @ready="setNewPassword = $event"/>
    <UiNewPassword v-if="setNewPassword"/>
  </div>
  <UiFooter/>
</template>

<script>
// @ is an alias to /src
import UiFooter from '@/components/Login/UiFooter.vue'
import UiHeader from '@/components/Login/UiHeader.vue'
import UiRequestResetPasswordForm from '@/components/Login/UiRequestResetPasswordForm.vue'
import UiNewPassword from '@/components/Login/UiNewPassword.vue'

export default {
  name: 'PageUserPlayers',
  data(){
    return{
      setNewPassword: false
    }
  },
  components: {
    UiHeader,
    UiFooter,
    UiRequestResetPasswordForm,
    UiNewPassword,
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
