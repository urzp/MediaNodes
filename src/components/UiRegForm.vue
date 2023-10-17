<template>
    <div class="login-form">
        <div class="title">Прежде чем начать,<br>зарегистрируйтесь в системе</div>
        <form>
            <UiInput modelTape='text' class="input" v-model="firstName"/>
            <UiInput modelTape='text' v-model="email"/>
            <UiInput modelTape='password' v-model="password"/>
            <div class="submit-row">
                <UiButton text="Создать аккаунт" bg_color="#F93492" text_color="#fff"/>
                <div class="login-ref">
                    Уже есть аккаунт? <a href="#">Войти</a>
                </div>
            </div>
        </form>
    </div>
    <div class="terms-of-use">
        Создавая учетную запись, я принимаю
        <a href="#">Пользовательское соглашение</a>
    </div>
</template>

<script>
import UiInput from '@/components/UiInput.vue'
import UiButton from '@/components/UiButton.vue'
export default {
  name: 'UiRegForm',
  components:{
    UiInput,
    UiButton
  },
  data(){
    return{
        firstName: 'Укажите ваше Имя',
        email: 'Введите ваш email',
        password: 'Придумайте пароль',
    }
  }
}
</script>

<style scoped>
    .login-form{
        height: 460px;
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
    .login-ref{
        font-family: 'Intro-Book';
        font-size: 15px;
    }

    .terms-of-use{
        color:#FFF;
        font-family: 'Intro-Book';
        font-size: 15px;
        display: flex;
        flex-direction: column;
        margin-top: 10px;
    }

    a{
        color: #F93492
    }
</style>