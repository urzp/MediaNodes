<template>
    <header>
        <RouterLink to="/" class="logo"><img src="@/assets/icons/Logo.png" alt="logo"></RouterLink>
        <div class="buttons">
            <UiButton v-if="login" class="button" text="Войти" @click="$router.push('/login')"/>
            <UiButton v-if="reg" class="button" text="Регистрация" @click="$router.push('/login')"/>
            <UiButton v-if="support" class="button" text="Связаться с нами" @click="$router.push('/support')"/>
        </div>
    </header>
</template>

<script>
import UiButton from '@/components/Login/UiButton.vue'

export default {
  name: 'UiHeader',
  components:{
    UiButton
  },
  props:{
    support:Boolean,
    login:Boolean, 
    reg:Boolean
  }
}
</script>

<style  scoped>

    header {
        background-color: #1F1F1F;
        position: fixed;
        height: 90px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .buttons{
        display: flex;
        justify-content: space-between;
    }

    .logo, .buttons, .button{
        margin: auto 20px;

    }


</style>
