<template>
    <div class="login-form">
        <div class="title">Прежде чем начать,<br>зарегистрируйтесь в системе</div>
        <form>
            <UiInput modelTape='text' class="input" v-model="firstName" placeholder="Укажите ваше Имя" :class="{'error':v$.firstName.$error}">
                <div v-if="v$.firstName.$error" >Введите имя</div>
            </UiInput>
            <UiInput modelTape='text' v-model="email" placeholder="Введите ваш email" :class="{'error':v$.email.$error}">
                <div v-if="v$.email.$error">Введите корректный email</div>
            </UiInput>
            <UiInput modelTape='password' v-model="password" placeholder="Придумайте пароль" :class="{'error':v$.password.$error}">
                <div v-if="v$.password.$error">пароль должен быть минимум 6 символов</div>
            </UiInput>
            <div class="submit-row">
                <UiButton text="Создать аккаунт" bg_color="#F93492" text_color="#fff" @click="submit"/>
                <div class="login-ref">
                    Уже есть аккаунт? <RouterLink to="login">Войти</RouterLink>
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
import useVuelidate from '@vuelidate/core'
import { required, email, minLength } from '@vuelidate/validators'
import UiInput from '@/components/UiInput.vue'
import UiButton from '@/components/UiButton.vue'
export default {
  name: 'UiRegForm',
  components:{
    UiInput,
    UiButton
  },
  setup () {
    return { v$: useVuelidate() }
  },
  data(){
    return{
        firstName: '',
        email: '',
        password: '',
    }
  },
  validations(){
    return{
        firstName: { required },
        email:{ required, email },
        password: { required, minLength:minLength(6) },
    }
  },
  methods:{
    submit(){
        this.v$.$validate()
        if(!this.v$.$error){
            this.v$.$touch()
            console.log('submit')
        }else{
            console.log('first name',this.v$.firstName.$error)
            console.log('mail',this.v$.email.$property)
            console.log(this.v$.email.required)
        }
        
    }
  }
}
</script>

<style scoped>
    .login-form{
        min-height: 460px;
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