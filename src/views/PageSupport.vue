<template>
  <UiHeader/>
  <div class="main">
    <UiSupportForm />
  </div>
  <UiFooter/>
</template>

<script>
// @ is an alias to /src
import UiFooter from '@/components/Login/UiFooter.vue'
import UiHeader from '@/components/Login/UiHeader.vue'
import UiSupportForm from '@/components/Login/UiSupportForm.vue'

export default {
  name: 'HomeView',
  components: {
    UiHeader,
    UiFooter,
    UiSupportForm,
   
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
