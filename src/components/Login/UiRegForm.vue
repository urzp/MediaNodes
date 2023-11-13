<template>
    <div class="login-form">
        <div class="title">Прежде чем начать,<br>зарегистрируйтесь в системе</div>
        <form>
            <UiInput modelTape='text' class="input" v-model="firstName" placeholder="Укажите ваше Имя" :class="{'error':v$.firstName.$error}">
                <div v-if="v$.firstName.$error" >Введите имя</div>
            </UiInput>
            <UiInput modelTape='text' v-model="email" placeholder="Введите ваш email" :class="{'error':v$.email.$error}">
                <div v-if="v$.email.$error">Введите корректный email</div>
                <div v-if="emailBusy">{{email}} уже занят</div>
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
            <VueRecaptcha
                ref="recaptcha"
                size="invisible" 
                :sitekey="sitekey"
                @verify="register"
                @expired="onCaptchaExpired"
              />
        </form>
    </div>
    <div class="terms-of-use">
        Создавая учетную запись, я принимаю
        <a href="#">Пользовательское соглашение</a>
    </div>
</template>

<script>
import  regUser  from '@/servis/regUser.js'
import useVuelidate from '@vuelidate/core'
import { required, email, minLength } from '@vuelidate/validators'
import UiInput from '@/components/UiComponents/UiInput.vue'
import UiButton from '@/components/Login/UiButton.vue'
import VueRecaptcha from 'vue3-recaptcha2'
import { EventBus } from '@/servis/EventBus'
export default {
  name: 'UiRegForm',
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
        firstName: '',
        email: '',
        password: '',
        emailBusy: false,
        sitekey: this.$settings.recaptcha_key,
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
        if(!this.v$.$error) this.$refs.recaptcha.execute()
    },
    async register(recaptchaToken){
        let user = {
                name: this.firstName,
                email: this.email,
                password: this.password,
                recaptchaToken: recaptchaToken,
            }

        let result = await regUser(user)
        if(result.success){
            this.$router.push('/login')
        }else if(result.error == 'email'){
            this.emailBusy = true 
            setTimeout(()=>{this.emailBusy = false }, 15000)
        }else if(result.error == 'recaptcha'){
            EventBus.emit('toaster',{status:'error', message:'Онаружены подозрительные действия', time: 15000});
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