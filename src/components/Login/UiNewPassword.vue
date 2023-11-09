<template>
    <div class="login-form">
        <div class="title">Сброс пароля аккаунта</div>
        <p>На указанный вами email, был выслан код потверждения сброса пароля от личного кабинета </p>
        <form>
            <UiInput modelTape='text' class="input" v-model="code" placeholder="Укажите высланный код" :class="{'error':v$.code.$error,'error':wrongCode}">
                <div v-if="v$.code.$error" >Введите код</div>
                <div v-if="wrongCode" >Код неподходит</div>
            </UiInput>
            <UiInput modelTape='password' v-model="password" placeholder="Придумайте новый пароль" :class="{'error':v$.password.$error}">
                <div v-if="v$.password.$error">пароль должен быть минимум 6 символов</div>
            </UiInput>
            <div class="submit-row">
                <UiButton text="Отправить пароль" bg_color="#F93492" text_color="#fff" @click="submit"/>
            </div>
        </form>
    </div>
</template>

<script>
import sendData from '@/servis/sendData.js'
import useVuelidate from '@vuelidate/core'
import { required, minLength } from '@vuelidate/validators'
import UiInput from '@/components/UiComponents/UiInput.vue'
import UiButton from '@/components/Login/UiButton.vue'
export default {
  name: 'UiNewPassword',
  components:{
    UiInput,
    UiButton
  },
  setup () {
    return { v$: useVuelidate() }
  },
  data(){
    return{
        code: '',
        password: '',
        wrongCode: false,
    }
  },
  validations(){
    return{
        code: { required },
        password: { required, minLength:minLength(6) },
    }
  },
  methods:{
    async submit(){
        this.v$.$validate()
        let storageEmail = sessionStorage.getItem('email_reset')
        console.log(storageEmail)
        if(!this.v$.$error){ 
            this.sendPassword(
                {code: this.code,
                email: storageEmail,
                password: this.password}
            )
        }  
    },
    async sendPassword(data){
        let result = await sendData('newPassword.php', data)
        if(result.success) {
            sessionStorage.setItem('email_reset', '');
            this.$router.push('/login')
        }else{
            this.wrongCode = true
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

    p{
        font-family: 'Intro-Book';
        font-size: 16px;
        margin: 20px auto;
        margin-bottom: 0px;
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