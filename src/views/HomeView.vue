<template>
  <UiLeftBar/>
  <div class="main">

  </div>
</template>

<script>
// @ is an alias to /src
import UiLeftBar from '@/components/UiLeftBar.vue'

export default {
  name: 'HomeView',
  components: {
    UiLeftBar,
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
