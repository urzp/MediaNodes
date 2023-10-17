<template>
    <div class="login-form">
        <div class="title">Войти в личный кабинет</div>
        <form>
            <UiInput modelTape='text' v-model="email"/>
            <UiInput modelTape='password' v-model="password"/>
            <div class="submit-row">
                <UiButton class="login-button" text="Войти" bg_color="#F93492" text_color="#fff"/>
                <div class="reset">
                    <a href="#">Забыли пароль?</a>
                </div>
            </div>
        </form>
    </div>
    <div class="registration">
        Необходимо создать учетную запись? 
        <a href="#">Зарегистрироваться</a>
    </div>
</template>

<script>
import UiInput from '@/components/UiInput.vue'
import UiButton from '@/components/UiButton.vue'
export default {
  name: 'UiLoginForm',
  components:{
    UiInput,
    UiButton
  },
  data(){
    return{
        email: 'Введите ваш email',
        password: 'Введите пароль',
    }
  }
}
</script>

<style scoped>
    .login-form{
        height: 365px;
        width: 560px;
        position: relative;
        top: -20px;
        background-color: #fff;
        border-radius: 5px ;
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
    }

    .title{
        font-family: 'Intro-Bold-Alt';
        font-size: 28px;
        color: #1F1F1F;
        margin-top: 60px;
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

    .submit-row{
        width: 456px;
        margin: 20px auto;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .login-button{
        width: 130px;
    }
    .reset{
        font-family: 'Intro-Book';
        font-size: 15px;
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
</style>