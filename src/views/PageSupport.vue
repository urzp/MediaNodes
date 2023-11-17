<template>
  <UiHeader login/>
  <div class="main">
    <UiSupportForm />
  </div>
  <UiFooter/>
  <UiToaster/>
</template>

<script>
// @ is an alias to /src
import UiFooter from '@/components/Login/UiFooter.vue'
import UiHeader from '@/components/Login/UiHeader.vue'
import UiSupportForm from '@/components/Login/UiSupportForm.vue'
import UiToaster from '@/components/UiToaster.vue'

export default {
  name: 'HomeView',
  components: {
    UiHeader,
    UiFooter,
    UiSupportForm,
    UiToaster,
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
