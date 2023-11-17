<template>
    <header>
        <RouterLink to="/" class="logo"><img src="@/assets/icons/Logo.svg" alt="logo"></RouterLink>
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
        position: fixed;
        top:0;
        height: 90px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #1F1F1F;
        z-index: 10;
    }
    .buttons{
        display: flex;
        justify-content: space-between;
    }

    .logo, .buttons, .button{
        margin: auto 20px;
    }

    .logo img{
        width: 50px;
    }

    @media(max-width:650px){
        .button{
            margin-right: 0px;
        }
    }
</style>
