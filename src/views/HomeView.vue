<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/icons/Logo.png">
    <HelloWorld msg="Welcome to Your Vue.js App"/>
  </div>
  <UiFooter/>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'
import UiFooter from '@/components/UiFooter.vue'

export default {
  name: 'HomeView',
  components: {
    HelloWorld,
    UiFooter
  }
}
</script>
