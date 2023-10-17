<template>
    <header>
        <RouterLink to="/" class="logo"><img src="../assets/icons/Logo.png" alt="logo"></RouterLink>
        <UiButton class="button-contact-us" text="Связаться с нами" @click="$router.push('/support')"/>
    </header>
</template>

<script>
import UiButton from '@/components/UiButton.vue'

export default {
  name: 'UiHeader',
  components:{
    UiButton
  }
}
</script>

<style>

    header {
        background-color: #1F1F1F;
        position: fixed;
        height: 90px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .logo, .button-contact-us{
        margin: auto 20px;
    }

</style>
