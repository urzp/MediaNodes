<template>
    <div class="login-form">
        <div class="title">Техподдержка</div>
        <p>У Вас появились проблемы? Или есть вопросы по управлению устройствами? Пожалуйста, заполните форму, и наш специалист свяжется с Вами в течение 24 часов.</p>
        <form>
            <UiInput modelTape='text' v-model="email" placeholder="Введите ваш email"/>
            <UiInput tag="textarea" class="textarea" modelTape='text' v-model="message"  placeholder="Введите ваше сообщение" />
            <UiButton class="submit-button" text="Отправить" bg_color="#F93492" text_color="#fff"/>
        </form>
    </div>
    <div class="registration">
        <RouterLink to="/register" class="link-wight">Регистрация</RouterLink>
        <RouterLink to="/login">Войти</RouterLink>
    </div>
</template>

<script>
import UiInput from '@/components/UiInput.vue'
import UiButton from '@/components/Login/UiButton.vue'
export default {
  name: 'UiSupportForm',
  components:{
    UiInput,
    UiButton
  },
  data(){
    return{
        email: '',
        message: '',
    }
  }
}
</script>

<style scoped>
    .login-form{
        height: 580px;
        width: 560px;
        position: relative;
        top: -20px;
        background-color: #fff;
        border-radius: 5px ;
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
    }

    .title{
        font-family: 'Intro-Bold-Alt';
        font-size: 28px;
        color: #1F1F1F;
        margin-top: 60px;
    }

    p{
        font-family: 'Intro-Book';
        font-size: 16px;
        margin-top: 20px;
        width: 420px;
    }

    p span{
        font-family: 'Intro-Bold-Alt';
    }

    form{
        margin-top:  40px;
    }

    form input{
        margin-top: 20px;
    }
    
    form :first-child{
        margin-top: 0px;
    }

    .submit-button{
        width: 400px;
        margin: 15px auto;
    }

    .registration{
        color:#FFF;
        font-family: 'Intro-Book';
        font-size: 15px;
        display: flex;
        flex-direction: row;
        margin-top: 10px;
    }

    a{
        color: #F93492;
        margin-left: 10px;   
    }

    .link-wight{
        color: #FFF;
    }
</style>