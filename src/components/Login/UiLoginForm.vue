<template>
    <div class="login-form">
        <div class="title">Войти в личный кабинет</div>
        <div v-if="wrongLogin" class="wrongLogin">Пользователь не найден</div>
        <form>
            <UiInput modelTape='text' v-model="email" placeholder="Введите ваш email" :class="{'error':v$.email.$error}">
                <div v-if="v$.email.$error">Введите корректный email</div>
            </UiInput>
            <UiInput modelTape='password' v-model="password" placeholder="Введите пароль" :class="{'error':v$.password.$error}" v-on:keyup.enter="submit()">
                <div v-if="v$.password.$error">Введите пароль</div>
            </UiInput>
            <div class="submit-row">
                <UiButton class="login-button" text="Войти" bg_color="#F93492" text_color="#fff" @click="submit()"/>
                <div class="reset">
                    <RouterLink to="reset-password">Забыли пароль?</RouterLink>
                </div>
            </div>
        </form>
    </div>
    <div class="registration">
        Необходимо создать учетную запись? 
        <RouterLink to="register">Зарегистрироваться</RouterLink>
    </div>
    <VueRecaptcha
        ref="recaptcha"
        size="invisible" 
        :sitekey="sitekey"
        @verify="login"
        @expired="onCaptchaExpired"
    />
</template>

<script>
import  loginRequest  from '@/servis/login.js'
import useVuelidate from '@vuelidate/core'
import { required, email, minLength } from '@vuelidate/validators'
import UiInput from '@/components/UiComponents/UiInput.vue'
import UiButton from '@/components/Login/UiButton.vue'
import VueRecaptcha from 'vue3-recaptcha2'
export default {
  name: 'UiLoginForm',
  components:{
    UiInput,
    UiButton,
    VueRecaptcha
  },
  setup () {
    return { v$: useVuelidate() }
  },
  data(){
    return{
        email: '',
        password: '',
        wrongLogin:false,
        sitekey: this.$settings.recaptcha_key,
    }
  }, 
  validations(){
    return{
        email:{ required, email },
        password: { required },
    }
  },
  methods:{
    submit(){
        this.v$.$validate()
        if(!this.v$.$error) this.$refs.recaptcha.execute()
    },
    async login(recaptchaToken){
        let data = {
            email: this.email,
            password: this.password,
            recaptchaToken: recaptchaToken,
        }
        let result = await loginRequest(data)
        if(result.success){
            sessionStorage.setItem('user', JSON.stringify(result.user));
            sessionStorage.setItem('session', result.session);
            this.$router.push('/')
        }else{
            this.wrongLogin = true 
            setTimeout(()=>{this.wrongLogin = false }, 3000)
        }
    },
    onCaptchaExpired () {
      this.$refs.recaptcha.reset()
    }
  }
}
</script>

<style scoped>
    .login-form{
        min-height: 365px;
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
        flex-wrap: wrap;
        justify-content: center;
        align-content: space-between;
        height: 40px;
    }

    a{
        color: #F93492;
        margin-left: 10px;   
    }
    .wrongLogin{
        color: #F93492;
        margin-top: 10px;
    }

    @media(max-width:650px){
        .login-form{
            width: 90%;
        }

        .title{
            width: 80%;
            margin-left: 10%;
        }

        form{
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;  
        }

        .submit-row{
            width: 100%;
        }

        .registration{
            width: 80%;
        }
        
    }

    @media(max-width:530px){
        .title{
            font-size: 20px;
        }

        .login-button{
            width: 80px;
        }
    }

    @media(max-width:380px){
        .title{
            font-size: 18px;
        }
        .submit-row{
            flex-direction: column;
        }

        .login-button{
            width: 80%;
        }

        .reset{
            margin-top: 20px;
        }

    }
</style>